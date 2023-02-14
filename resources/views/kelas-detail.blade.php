@extends('layout.master-layout')
@section('content')
<div class="body d-flex py-3">
    <div class="container-xxl">
    @if ($kelas->count())
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
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Pengaturan
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{ route('kelas.edit', ['id'=>$item->id, 'nama_kelas'=>$item->nama_kelas]) }}">Edit Kelas</a></li>
                    <li><a class="dropdown-item" href="{{ route('siswa', $item->nama_kelas) }}">Lihat Siswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item" onclick='confirmDelete(`{{$item->id}}`, `{{$item->nama_kelas}}`)'>Delete</button></li>
                </ul>
            </div>
            </li>
        @endforeach
        </ul>
    @else
        Belum ada sesuatu
    @endif
@endsection
    </div>
</div>

@section('script')
<script>
    function confirmDelete(id, kelas) {
      let text = `Kamu yakin? Ini akan menghapus kelas ${kelas} untuk selamanya.`;
      if (confirm(text) == true) {
        location.href = `http://127.0.0.1:8000/kelas/delete/${id}`;
      } else {
        text = "You canceled!";
      }
      document.getElementById("demo").innerHTML = text;
    }
</script>
@endsection
