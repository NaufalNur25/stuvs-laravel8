@extends('layout.main-layout')
@section('content')
<nav class="navbar bg-light">
    <!-- As a heading -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="btn btn-danger" href="{{ route('jurusan') }}" role="button">Kembali</a>
        </div>
    </nav>
</nav>
    @if ($kelas->count())
    <!-- As a link -->
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <ul class="list-group mt-3">
            @foreach ($kelas as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->nama_kelas }}
                <!-- Example single danger button -->
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Settings
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('kelas.edit', ['id'=>$item->id, 'nama_kelas'=>$item->nama_kelas]) }}">Edit Kelas</a></li>
                <li><a class="dropdown-item" href="{{ route('siswa', $item->nama_kelas) }}">Lihat Siswa</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><button class="dropdown-item text" onclick='confirmDelete(`{{$item->id}}`, `{{$item->nama_kelas}}`)'>Delete</a></li>
                </ul>
            </div>
            </li>
        @endforeach
        </ul>
    </div>
    @else
        @include('partials.404')
    @endif
@endsection

@section('script-extention')
<script>
    function confirmDelete(id, kelas) {
      let text = `Yakin kamu akan kehilangan kelas ${kelas} untuk selamanya.`;
      if (confirm(text) == true) {
        location.href = `http://127.0.0.1:8000/kelas/delete/${id}`;
      } else {
        text = "You canceled!";
      }
      document.getElementById("demo").innerHTML = text;
    }
</script>
@endsection
