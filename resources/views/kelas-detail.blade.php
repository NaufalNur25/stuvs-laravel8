@extends('layout.master-layout')
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <div class="col-auto d-flex w-sm-100">
                        <h3>Jurusan: </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($kelas->count())
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

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
