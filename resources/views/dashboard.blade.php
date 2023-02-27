@extends('layout.master-layout')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">
            @can('administrator')
                @include('partials.admin.dashboard')
            @endcan
            @can('petugas')
                @include('partials.petugas.dashboard')
            @endcan
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
        // Ambil semua elemen dengan kelas "laporan-row"
        const rows = document.querySelectorAll('.laporan-row');

        // Loop melalui setiap row dan tambahkan event click
        rows.forEach(row => {
        row.addEventListener('click', () => {
                // Ambil nilai tanggal dari row yang diklik
                const tanggal = row.querySelector('td:last-child').textContent;
                // Tampilkan tanggal pada elemen dengan id "tanggal"
                document.getElementById('tanggal').textContent = tanggal;
            });
        });
    </script>
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

            @can('administrator')
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
            @endcan

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
