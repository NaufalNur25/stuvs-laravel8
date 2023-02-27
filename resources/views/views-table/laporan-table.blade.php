@extends('layout.master-layout')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            @can('administrator')
                @include('partials.admin.laporan')
            @endcan
            @can('petugas')
                @include('partials.petugas.laporan')
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
    </script>

    <script>
        var day = <?php echo json_encode($day) ?>;
        var laporanDay = <?php echo json_encode($laporan_day) ?>;
        var tahun = <?php echo json_encode($tahun)?>;
        var bulan = <?php echo json_encode($bulan)?>;

        var options = {
            series: [{
                name: 'Laporan',
                data: laporanDay
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 15,
                    dataLabels: {
                        position: 'center', // top, center, bottom
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
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: day,
                position: 'buttom',
                axisBorder: {
                    show: true
                },
                axisTicks: {
                    show: true
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

            },
            title: {
                text: `Laporan Bulan - ${bulan}, ${tahun}`,
                floating: true,
                offsetY: 0,
                align: 'center',
                style: {
                    color: '#444'

                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-laporanBulanan"), options);
        chart.render();
    </script>
@endsection
