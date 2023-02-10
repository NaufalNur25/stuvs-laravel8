@extends('layout.main-layout')
@section('content')
<nav class="navbar bg-light mb-5">
    <!-- As a heading -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="btn btn-secondary" href="{{ back() }}" role="button">X</a>
        </div>
    </nav>
</nav>

<div class="container">
    <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" class="form-control" id="formGroupExampleInput" aria-label="Disabled input example" placeholder="{{ $kelas->id }}" disabled>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="formGroupExampleInput" aria-label="Disabled input example" placeholder="{{ $kelas->jurusan->nama_jurusan }}" disabled>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama Kelas</label>
            <input name="nama_kelas" type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ $kelas->nama_kelas }}" value="{{ $kelas->nama_kelas }}">
        </div>

        <div class="col-12">
            <a href="{{ route('kelas.delete', $kelas->id) }}" class="btn btn-outline-danger">Delete</a>
            <button type="submit" class="btn btn-warning px-5">Ubah</button>
        </div>
    </form>
</div>
@endsection
