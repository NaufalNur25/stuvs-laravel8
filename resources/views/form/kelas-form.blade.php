@extends('layout.master-layout')
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{ route('kelas.store') }}" method="post">
                @csrf
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <h5>Jurusan List: </h5>
                        @if ($jurusan->count() > 0)
                            <ol class="list-group list-group-numbered">
                                @foreach ($jurusan as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $item->nama_jurusan }}</div>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ $item->kelas->count() }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <h6>Tidak ada jurusan yang ditambahkan.</h6>
                        @endif
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" name="jurusan_id" id="jurusan" required onload="kelas()" required aria-describedby="infoPenting">
                                    <option disabled selected>...</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="validationDefaultUsername" class="form-label">Nama Kelas</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-check"></i></span>
                                    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" disabled>
                                </div>
                            </div>
                            <div id="infoPenting" class="form-text">
                                <b>Informasi!</b> Input data <em>Nama Kelas</em> dengan nama yang format, seperti <u>Jurusan-Kelas</u>: "XII-RPL1" <br>
                                Ini akan mempermudah pencarian data nantinya.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const jurusanSelect = document.getElementById("jurusan");
        const namaKelasInput = document.getElementById("nama_kelas");

        jurusanSelect.addEventListener("change", () => {
        if (jurusanSelect.value) {
            namaKelasInput.disabled = false;
        } else {
            namaKelasInput.disabled = true;
        }
        });
    </script>
@endsection
