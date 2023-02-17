@extends('layout.master-layout')

@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form method="post" class="row g-3" id="haschange"
                action="{{ @$guru ? route('guru.update', encrypt($guru->id)) : route('guru.store') }}">
                @csrf
                @if (@$guru)
                    @method('PUT')
                @endif
                <div class="col-md-6">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap Guru</label>
                    <input type="text" name="nama_lengkap"
                        class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                        value="{{ @$guru ? $guru->nama_lengkap : '' }}" required>
                </div>
                <div class="col-md-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="input-group">
                        <label class="input-group-text" for="jenis_kelamin">Pilih</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin" required>
                            <option selected disabled>...</option>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', @$guru->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', @$guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationDefaultUsername" class="form-label">Nomor Induk Pegawai</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-check"></i></span>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="nip"
                            id="nip" value="{{ @$guru->nip }}" {{ @$guru ? 'disabled' : '' }} required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" id="jurusan" required {{ @$guru ? 'disabled' : '' }} onload="kelas()"
                        aria-describedby="infoPENTING">
                        <option>...</option>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}"
                                {{ @$guru->kelas->jurusan->id == $item->id ? 'selected' : '' }}>{{ $item->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas_id"></select>
                </div>

                @if (@$guru)
                <div id="infoPENTING" class="form-text">
                </div>
                @else
                <div id="infoPENTING" class="form-text">
                    <b>PERINGATAN!</b> Input data kelas hanya jika guru tersebut Wali dari suatu Kelas... <br>
                    <u>Bila tidak</u> Biarkan form "Jurusan" dan "Kelas" kosong.
                </div>
                @endif


                @if (@$guru)
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                @else
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="validating" required>
                            <label class="form-check-label" for="validating">
                                Setujui dan buat data guru baru
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success" type="submit" id="submitBtn" disabled>Tambahkan</button>
                        <button type="button" class="btn btn-outline-warning" id="importBtn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" disabled>Import Data Guru</button>
                    </div>
                @endif
            </form>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Siswa - Excel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2><strong>PERINGATAN!</strong></h2>
                    <p>Semakin banyak data yang dimuat artinya semakin lama proses import,
                        lama waktu import ini tergantung dari seberapa komples data yang dimuat.<br><br>
                        <i>Untuk menghindari respon yang terlalu lama pada server. </i><u>Disarankan</u> untuk memisahkan
                        data menjadi perkelas.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('siswa.import') }}" class="btn btn-success px-5">Import</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#auto_generate").change(function() {
                if ($(this).is(':checked')) {
                    document.getElementById('nis').value = "";
                    $("#nis").attr("disabled", true);
                    console.log("#auto_generate checked");
                } else {
                    $("#nis").attr("disabled", false);
                    console.log("#auto_generate not checked");
                }
            });
        });
        console.log("#nis");
    </script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        document.getElementById("validating").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("submitBtn").disabled = false;
                document.getElementById("importBtn").disabled = false;
            } else {
                document.getElementById("submitBtn").disabled = true;
                document.getElementById("importBtn").disabled = true;
            }
        });
    </script>

    <script>
        const mySelect = document.getElementById("jurusan");
        const myFunction = () => {
            alert(`Menambahkan kelas pada guru artinya "Guru tersebut adalah Wali dari kelas yang dimaksud"`);
            mySelect.removeEventListener("change", myFunction);
        };
        mySelect.addEventListener("change", myFunction);

        // const jurusanSelect = document.getElementById("jurusan");
        // const kelasSelect = document.getElementById("kelas");

        // jurusanSelect.addEventListener("change", () => {
        //     if (jurusanSelect.value !== "...") {
        //         kelasSelect.disabled = false;
        //     } else {
        //         kelasSelect.disabled = true;
        //     }
        // });
    </script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $('#jurusan').on('change', function() {
                    let id_jurusan = $('#jurusan').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('ajax.getJurusanID') }}",
                        data: {
                            id_jurusan: id_jurusan
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kelas').html(msg);

                            var id = <?php echo json_encode(@$siswa ? @$siswa['kelas_id'] : @$guru['kelas_id']); ?>;
                            $(`option[value="${id}"]`).prop("selected", true);
                            console.log(id);
                        },
                        error: function(data) {
                            console.log('error: ', data)
                        }
                    });
                });
                $('#jurusan').trigger('change');
            });
        });
    </script>
@endsection
