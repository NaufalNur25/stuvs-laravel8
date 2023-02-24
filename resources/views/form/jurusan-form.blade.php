@extends('layout.master-layout')
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{ route('jurusan.store') }}" method="post">
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
                        <div class="form-group mb-3">
                            <label for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control mt-2" id="nama_jurusan" required>
                        </div>
                        <div id="infoPENTING" class="form-text">
                            <b>Informasi!</b> Input data <em>Nama Jurusan</em> dengan nama yang lengkap, seperti <u>Teknik Komputer Informatika.</u> <br>
                            <b>Bila disingkat gunakan</b> TKI
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
