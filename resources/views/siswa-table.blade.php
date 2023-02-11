@extends('layout.main-layout')
@section('css')
{{-- <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" type="image/x-icon"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css"/>

@endsection
@section('content')
    <!-- As a heading -->
    <nav class="navbar bg-light">
        <div class="container-fluid py-2">
            <a class="btn btn-danger" href="" role="button">< Kembali</a>
            <a class="btn btn-success ml-auto" href="{{ route('siswa.create') }}" role="button">+ Tambahkan Siswa</a>
        </div>
    </nav>

<div class="container mt-5">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Score</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->kelas->nama_kelas }}</td>
                <td>{{ $item->kelas->jurusan->nama_jurusan }}</td>
                <td>{{ $item->nilai }}</td>
                <td class="text-center">
                    <a class="btn btn-warning px-4" href="{{ route('siswa.edit', encrypt($item->id)) }}" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a id="" class="btn btn-outline-secondary px-4" role="button"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $siswa->appends(['sort' => 'votes'])->links() !!} --}}
</div>
@endsection

@section('script-extention')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>
<script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        scrollX: true
        });
</script>
@endsection
