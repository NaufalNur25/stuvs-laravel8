@extends('layout.main-layout')
@section('content')
<div class="container">
    <div class="row row-cols-2 g-3">
        <div class="col col-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">List Jurusan:</h5>
                <p class="card-text">
                  @if (count($jurusan))
                  <ul class="list-group">
                  @foreach ($jurusan as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{ $item->nama_jurusan }}
                      {{-- <span class="badge bg-primary rounded-pill">1</span> --}}
                      <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">+</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item->nama_jurusan }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                          <div class="col-8">
                                            <form action="/kelas" method="post">
                                                @csrf
                                                <div class="row g-3">
                                                    <div class="col-10">
                                                        <select name="nama_kelas" class="form-select" aria-label="Default select example">
                                                            <option selected disabled>Kelas</option>
                                                            <option value="X-{{ $item->initial }}">X-{{ $item->initial }}</option>
                                                            <option value="XI-{{ $item->initial }}">XI-{{ $item->initial }}</option>
                                                            <option value="XII-{{ $item->initial }}">XII-{{ $item->initial }}</option>
                                                            <option value="XIII-{{ $item->initial }}">XIII-{{ $item->initial }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-outline">
                                                            <input type="number" name="count" class="form-control" placeholder="Banyak Kelas" min="1" max="20"/>
                                                        </div>
                                                    </div>
                                                  </div>
                                                <button type="submit" class="btn btn-primary mt-2">+ Tambah Kelas</button>
                                            </form>
                                        </div>
                                          <div class="col-4 ms-auto">
                                            <h3>List Kelas: </h3>
                                            @if (count($jurusan))
                                            <ul class="list-group">
                                            @foreach ($jurusan as $item)
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $item->initial }}
                                                <span class="badge bg-primary rounded-pill">{{ $item->kelas->count() }}</span>
                                              </li>
                                              @endforeach
                                            </ul>
                                            @else
                                                Belum ada kelas yang ditambahkan.
                                            @endif
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('kelas.detail', $item->id) }}" class="btn btn-outline-primary">Lihat Kelas</a>
                                    <button type="button" class="btn btn-danger" onclick='confirmDelete(`{{$item->id}}`)'>Delete Jurusan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </li>

                    <!-- Button trigger modal -->
                    @endforeach
                </ul>
                  @else
                  Tidak ada jurusan yang ditambahkan?
                  @endif
                </p>
              </div>
            </div>
        </div>
        <div class="col col-8">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card text-start">
                <div class="card-body">
                  <form action="/jurusan" method="post">
                    @csrf
                      <div class="mb-3">
                        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                        <input name="nama_jurusan" type="text" class="form-control" id="nama_jurusan" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Buat Jurusan</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
        })
</script>

{{-- <button type="button" class="btn btn-danger" onclick="()=>confirmDelete($jurusan->id)">Delete Jurusan</button> --}}
<script>
    function confirmDelete(id) {
      let text = "Menghapus jurusan artinya menghapus semua kelas pada jurusan ini.\nOk untuk menghapus jurusan atau Cancel.";
      if (confirm(text) == true) {
        location.href = `http://127.0.0.1:8000/jurusan/delete/${id}`;
      } else {
        text = "You canceled!";
      }
      document.getElementById("demo").innerHTML = text;
    }
</script>
@endsection

