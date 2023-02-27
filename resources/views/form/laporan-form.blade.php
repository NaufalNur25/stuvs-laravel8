@extends('layout.master-layout')

@section('content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <form method="post" class="row g-3" id="haschange" action="{{route('laporan.store')}}">
            @csrf
            @if (@$siswa)
                @method('PUT')
            @endif
            <div class="col-md-6">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan" required>
                    <option selected disabled>...</option>
                    @foreach ($jurusan as $item)
                        <option value="{{ $item->id }}"
                            {{ @$siswa->kelas->jurusan->id == $item->id ? 'selected' : '' }}>{{ $item->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" id="kelas" name="kelas_id" required></select>
            </div>

            <div class="col-md-8">
                <label for="siswa" class="form-label">Nama Siswa</label>
                <select class="form-select" id="siswa" name="nis" required></select>
            </div>

            <div class="col-md-4">
                <label for="kategoriLaporan" class="form-label">Kategori</label>
                <select class="form-select" id="kategoriLaporan" name="kategori_id" required>
                    <option selected disabled>...</option>
                    @foreach ($kategoriLaporan as $item)
                        <option value="{{$item->id}}">{{$item->nama_pelanggaran}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label for="validationDefaultUsername" class="form-label">Deskripsi Laporan</label>
                <div class="input-group">
                    <textarea  type="text" class="form-control" name="deskripsi_laporan" id="deskripsi_laporan"></textarea>
                </div>
            </div>
            <div id="infoPENTING" class="form-text mb-3">
                <b>INFORMASI!</b> <em>Deskripsi Laporan</em> dapat dibiarkan kosong,<br>
                <u>Tetap</u> kami menyarankan petugas untuk mengisinya.
            </div>

            @if (@$siswa)
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
            @else
                <div class="col-12">
                    <button class="btn btn-success" type="submit" id="submitBtn">Laporkan</button>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection

@section('script')
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
                    jurusan_id: id_jurusan
                },
                cache: false,

                success: function(msg) {
                    $('#kelas').html(msg);
                },
                error: function(data) {
                    console.log('error: ', data)
                }
            });
        });

        $('#kelas').on('change', function() {
            let id_kelas = $('#kelas').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('ajax.getSiswa') }}",
                data: {
                    kelas_id: id_kelas
                },
                cache: false,

                success: function(msg) {
                    $('#siswa').html(msg);
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
