@extends('layout.main-layout')
@section('content')
<div class="container">
    <ul class="list-group">
        @foreach ($kelas as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $item->nama_kelas }}
            <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Action
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Edit Kelas</a></li>
            <li><a class="dropdown-item" href="#">Lihat Siswa</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Delete</a></li>
            </ul>
        </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
