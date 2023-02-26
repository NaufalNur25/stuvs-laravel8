@extends('layout.master-layout')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row clearfix g-3">
                <div class="col-xl-8 col-lg-12 col-md-12 flex-column">
                    <div class="row g-3 row-deck">
                        <div class="col-md-6 col-lg-6 col-xl-12">
                            <div class="card bg-primary">
                                <div class="card-body row">
                                    <div class="col">
                                        <h2 class="mt-3 mb-0 fw-bold text-white">{{$laporanCount}} Laporan</h2>
                                        <span class="text-white"><i class="icofont-warning fs-5"></i> Total Laporan Terkirim</span>
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid" src="assets/images/interview.svg" alt="interview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-12  flex-column">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center flex-fill">
                                        <span
                                            class="avatar lg light-success-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i
                                                class="icofont-users-alt-2 fs-5"></i></span>
                                        <div class="d-flex flex-column ps-3  flex-fill">
                                            <h6 class="fw-bold mb-0 fs-4">{{ $akunCount }}</h6>
                                            <span class="text-muted">Akun dibuat</span>
                                        </div>
                                        <i class="icofont-chart-bar-graph fs-3 text-muted"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center flex-fill">
                                        <span
                                            class="avatar lg light-success-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i
                                                class="icofont-holding-hands fs-5"></i></span>
                                        <div class="d-flex flex-column ps-3 flex-fill">
                                            <h6 class="fw-bold mb-0 fs-4">{{ $kelasCount }}</h6>
                                            <span class="text-muted">Banyak Kelas</span>
                                        </div>
                                        <i class="icofont-chart-line fs-3 text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Total Murid</h6>
                                    <h4 class="mb-0 fw-bold ">{{ $siswaCount }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mt-3" id="apex-JenisKelamin"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Total Guru</h6>
                                    <h4 class="mb-0 fw-bold ">{{ $guruCount }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mt-3" id="apex-Petugas"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            if (typeof jQuery === "undefined") {
                throw new Error("jQuery plugins need to be before this file");
            }
            $(function() {
                "use strict";
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
                var banyakLakiLakiSiswa = <?php echo json_encode(
                    @$jumlahSiswa
                        ->where('jenis_kelamin', 'Laki-laki')
                        ->pluck('jumlah')
                        ->first(),
                ); ?>;
                var banyakPerempuanSiswa = <?php echo json_encode(
                    @$jumlahSiswa
                        ->where('jenis_kelamin', 'Perempuan')
                        ->pluck('jumlah')
                        ->first(),
                ); ?>;

                var banyakLakiLakiGuru = <?php echo json_encode(
                    @$jumlahGuru
                        ->where('jenis_kelamin', 'Laki-laki')
                        ->pluck('jumlah')
                        ->first(),
                ); ?>;
                var banyakPerempuanGuru = <?php echo json_encode(
                    @$jumlahGuru
                        ->where('jenis_kelamin', 'Perempuan')
                        ->pluck('jumlah')
                        ->first(),
                ); ?>;

                // // console.log(banyakLakiLaki['jumlah']);
                // console.log(banyakPerempuan['jumlah']);



                // Jenis Kelamin Data
                $(document).ready(function() {
                    var options = {
                        align: 'center',
                        chart: {
                            height: 250,
                            type: 'donut',
                            align: 'center',
                        },
                        labels: ['Laki-laki', 'Perempuan'],
                        dataLabels: {
                            enabled: false,
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            show: true,
                        },
                        colors: ['var(--chart-color4)', 'var(--chart-color3)'],
                        series: [banyakLakiLakiSiswa || 0, banyakPerempuanSiswa || 0],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    }
                    var chart = new ApexCharts(document.querySelector("#apex-JenisKelamin"), options);
                    chart.render();
                });

                // Guru Data
                $(document).ready(function() {
                    var options = {
                        align: 'center',
                        chart: {
                            height: 250,
                            type: 'donut',
                            align: 'center',
                        },
                        labels: ['Laki-laki', 'Perempuan'],
                        dataLabels: {
                            enabled: false,
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            show: true,
                        },
                        colors: ['var(--chart-color4)', 'var(--chart-color3)'],
                        series: [banyakLakiLakiGuru || 0, banyakPerempuanGuru || 0],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    }
                    var chart = new ApexCharts(document.querySelector("#apex-Petugas"), options);
                    chart.render();
                });
            });
        </script>
    @endsection
