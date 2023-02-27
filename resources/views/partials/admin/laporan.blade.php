<div class="row align-items-center g-3 mb-3">
    <div class="border-0 mb-4">
        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 border-bottom">
            <h3 class="fw-bold me-auto mb-0">Laporan</h3>
            <form method="get" class="ms-auto">
                <div class="input-group">
                    <input type="date" class="form-control" name="date"
                        value="{{ session()->get('date') }}" required>
                    <button class="btn btn-primary" type="submit"><i class="icofont-ui-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- Row end  -->
<div class="row align-item-center row-deck g-3 mb-3">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header align-items-center d-flex px-0 justify-content-between pt-3 mx-3">
                <h6 class="mb-0 fw-bold card-title mt-3 ms-2">Deskripsi Laporan:</h6>
            </div>
            <div class="card-body">
                <p id="deskripsi-pelanggaran" class="ms-2">-</p>
            </div>
        </div> <!-- .card: My Timeline -->
    </div>
    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="myProjectTable" class="table table-hover align-middle mb-0 text-center"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Jenis Pelanggaran</th>
                            <th>Nama Pelanggar</th>
                            <th>Petugas-Melaporkan</th>
                            <th>Waktu Kejadian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $item)
                            <tr class="laporan-row" data-deskripsi="{{ $item->deskripsi_laporan }}">
                                <td><span
                                        class="badge bg-{{ $color[$item->kategori_laporan_id] }} p-2">{{ $item->kategoriLaporan->nama_pelanggaran }}</span>
                                </td>
                                <td>{{ $item->siswa->nama_lengkap }}
                                    (<b>{{ $item->siswa->kelas->nama_kelas }}</b>)</td>
                                <td>Rizky Amallia Eshi, S.Pd.</td>
                                <td>{{ $item->tanggal_waktu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- Row end  -->
<div class="row align-item-center row-deck g-3 mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="ac-line-transparent" id="apex-laporanBulanan"></div>
            </div>
        </div>
    </div>
</div>
