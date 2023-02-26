@extends('layout.master-layout')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
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
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Laporan {{$bulan}}, {{$tahun}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="ac-line-transparent" id="apex-laporanBulanan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myProjectTable')
                .addClass('nowrap')
                .dataTable({
                    scrollY: '200px',
                    paging: false,
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Tambahkan event listener pada tabel laporan
            $('#myProjectTable').on('click', '.laporan-row', function() {
                // Ambil deskripsi pelanggaran dari data attribute "data-deskripsi"
                var deskripsi = $(this).data('deskripsi');
                // Tampilkan deskripsi pelanggaran pada deskripsi card
                $('#deskripsi-pelanggaran').text(deskripsi);
            });
        });
    </script>

    <script>
        var day = <?php echo json_encode($day) ?>;
        var laporanDay = <?php echo json_encode($laporan_day) ?>;

        var options = {
            series: [{
                name: 'Laporan',
                data: laporanDay
            }],
            chart: {
                height: 400,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val;
                },
                offsetY: -20,
                style: {
                    fontSize: '10px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: day,
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return val + " Pelanggaran";
                    }
                }

            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-laporanBulanan"), options);
        chart.render();
    </script>
@endsection
