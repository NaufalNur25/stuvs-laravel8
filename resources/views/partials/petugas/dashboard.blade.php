<div class="row align-item-center row-deck g-3 mb-3">
    @if ($kelasWalikelas->kelas_id !== null)
    <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12">
        <div class="row g-3 row-deck">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-primary">
                    <div class="card-body row">
                        <div class="col">
                            <div>
                                <h2 class="mt-3 mb-0 fw-bold text-white">{{@$laporanCount}} Laporan</h2>
                            </div>
                            <span class="text-white"><i class="icofont-warning fs-5"></i> Total laporan terkirim - Harian</span>
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="assets/images/interview.svg" alt="interview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">
        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                <h6 class="mb-0 fw-bold">{{@$kelasWalikelas->kelas->nama_kelas}}</h6>
                <h4 class="mb-0 fw-bold">{{@$siswaCount}}</h4>
            </div>
            <div class="card-body">
                <div class="mt-3" id="apex-JenisKelamin"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header align-items-center d-flex px-0 justify-content-between pt-3 mx-3">
                <h6 class="mb-0 fw-bold card-title mt-3 ms-2">Deskripsi Laporan:</h6>
                <p class="mb-0 fw-bold mt-3 me-2" id='tanggal'></p>
            </div>
            <div class="card-body">
                <p id="deskripsi-pelanggaran" class="ms-2">-</p>
            </div>
        </div>
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
                        @foreach (@$siswaPelanggaran as $item)
                            @foreach (@$item->laporan as $laporan)
                            @php
                                $waktu = @$laporan->tanggal_waktu;
                                $valueTime = Carbon\Carbon::parse(@$waktu)->diffForHumans(now());
                            @endphp
                                <tr class="laporan-row" data-deskripsi="{{ @$laporan->deskripsi_laporan }}">
                                    <td>
                                        <span class="badge bg-success p-2">
                                            {{ @$laporan->kategoriLaporan->nama_pelanggaran }}
                                        </span>
                                    </td>
                                    <td>{{ @$laporan->siswa->nama_lengkap }}</td>
                                    <td>{{ @$laporan->user->guru->nama_lengkap }}</td>
                                    <td>
                                        {{ @$valueTime }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
        <div class="row g-3 row-deck">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-primary">
                    <div class="card-body row">
                        <div class="col">
                            <div>
                                <h2 class="m-5 fw-bold text-white">HI, {{ auth()->user()->guru->nama_lengkap }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
