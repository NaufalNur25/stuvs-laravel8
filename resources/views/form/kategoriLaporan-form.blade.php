@extends('layout.master-layout')
@section('extention')
@if (@$kategori)
<h6 class="mb-0 fw-bold ">Action</h6>
<form onclick="return confirm('Kamu Yakin? Data ini akan terhapus selamanya.')" action="{{route('kategoriLaporan.delete', @$kategori->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger mt-1 px-5">Delete</button>
</form>
@endif
@endsection
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{@$kategori ? route('kategoriLaporan.update', encrypt(@$kategori->id)) : route('kategoriLaporan.store')}}" method="post">
                @csrf
                @if (@$kategori)
                @method('PUT')
                @endif
                <div class="row gutters">
                    @if (@$kategori_laporan)
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <h5>Kategori List: </h5>
                        @if ($kategori_laporan->count() > 0)
                            <ol class="list-group list-group-numbered">
                                @foreach ($kategori_laporan as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $item->nama_pelanggaran }}</div>
                                        </div>
                                        <span class="badge bg-primary rounded-pill p-2">{{ $item->jenis_pelanggaran }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <h6>Tidak ada kategori pelanggaran yang ditambahkan.</h6>
                        @endif
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
                    @else
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @endif
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label for="jenis_pelanggaran" class="form-label">Kategori</label>
                                <select class="form-select" name="jenis_pelanggaran" id="jenis_pelanggaran" required onload="kelas()" required aria-describedby="infoPenting">
                                    <option disabled selected>...</option>
                                    <option value="Ringan" {{@$kategori->jenis_pelanggaran == 'Ringan' ? 'selected' : ''}}>Ringan</option>
                                    <option value="Sedang" {{@$kategori->jenis_pelanggaran == 'Sedang' ? 'selected' : ''}}>Sedang</option>
                                    <option value="Berat" {{@$kategori->jenis_pelanggaran == 'Berat' ? 'selected' : ''}}>Berat</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="validationDefaultUsername" class="form-label">Nama Pelanggaran</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-check"></i></span>
                                    <input type="text" class="form-control @error('nama_pelanggaran')
                                    is-invalid
                                @enderror" name="nama_pelanggaran" id="nama_kelas" value="{{@$kategori->nama_pelanggaran}}" {{ @$kategori ? '' : 'disabled'}}>
                                @error('nama_pelanggaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationDefaultUsername" class="form-label">Deskripsi Pelanggaran</label>
                                <div class="input-group mb-3">
                                    <textarea  type="text" class="form-control" name="deskripsi_pelanggaran" id="deskripsi_pelanggaran" {{ @$kategori ? '' : 'disabled'}}>{{@$kategori->deskripsi_pelanggaran}}</textarea>
                                </div>
                            </div>

                            <div id="infoPenting" class="form-text">
                                <b>Informasi!</b> Input data <em>Deskripsi</em> dapat dikosongkan jika tidak ingin menambahkan deskripsi.
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            @if (@$kategori)
                                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            @else
                            <button type="submit" class="btn btn-success mt-3">Tambahkan</button>
                            @endif
                        </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@if (@$kategori_laporan)
<script>
    const jurusanSelect = document.getElementById("jenis_pelanggaran");
    const deskripsiPelanggaranSelect = document.getElementById("deskripsi_pelanggaran");
    const namaKelasInput = document.getElementById("nama_kelas");

    jurusanSelect.addEventListener("change", () => {
    if (jurusanSelect.value) {
        namaKelasInput.disabled = false;
        deskripsiPelanggaranSelect.disabled = false;
    } else {
        namaKelasInput.disabled = true;
        deskripsiPelanggaranSelect.disabled = true;
    }
    });
</script>
@endif
@endsection
