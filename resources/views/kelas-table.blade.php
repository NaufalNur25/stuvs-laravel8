@extends('layout.master-layout')

@section('content')
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center g-3 mb-3">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Kelas</h3>
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
                    <div class="card-header py-3">
                        <h6 class="mb-0 fw-bold ">List Jurusan:</h6>
                    </div>
                    <div class="card-body">
                        @if ($jurusan)
                            <ul class="list-group">
                                @foreach ($jurusan as $key => $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $item->nama_jurusan }}
                                        <div class="list-group-text">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}"><i class="icofont-ui-add"></i></button>
                                        </div>

                                        <!-- Show Kelas -->
                                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1"  aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title  fw-bold" id="leaveaddLabel">List Kelas - Jurusan: {{ $item->nama_jurusan }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (count($jurusan))
                                                        <ul class="list-group my-5">
                                                            @foreach ($jurusan[$key]->kelas as $detail)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $detail->nama_kelas }}
                                                                <!-- Example single danger button -->
                                                            <div class="btn-group" role="group">
                                                                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Pengaturan
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                    <li><a class="dropdown-item" href="">Edit Kelas</a></li>
                                                                    <li><a class="dropdown-item" href="">Lihat Siswa</a></li>
                                                                    <li><hr class="dropdown-divider"></li>
                                                                    <li><button class="dropdown-item">Delete</button></li>
                                                                </ul>
                                                            </div>
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    @else
                                                        Belum ada kelas yang ditambahkan.
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <form onclick="return confirm(`INI SANGAT BERBAHAYA\nKamu akan menghapus 'Jurusan', artinya data 'Kelas' akan ikut terhapus, begitu pula dengan 'Siswa' pada kelas yang terhapus.\nDalam kata lain menghapus semua data pada 'Jurusan' tersebut.`)" action="{{route('jurusan.delete', $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                                    </form>
                                                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Selesai</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            Tidak ada jurusan yang ditambahkan?
                        @endif
                    </div>
                </div> <!-- .card: My Timeline -->
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0 text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Wali Kelas</th>
                                        <th>Jumlah Murid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($kelas as $item)
                                  <tr>
                                      <td>{{ $item->nama_kelas }}</td>
                                      <td>{{ optional($item->jurusan)->nama_jurusan }}</td>
                                      <td><i class="icofont-{{ optional($item->guru)->nama_lengkap  ? 'check' : 'close' }}-circled text-{{ optional($item->guru)->nama_lengkap ? 'success' : 'danger'}}">-{{optional($item->guru)->nama_lengkap ?: 'Tidak memiliki walikelas?' }}</i></td>
                                      <td class="text-success fw-bold">{{ $item->siswa->count() }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3 mb-3">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div
                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Total Murid</h6>
                        <h4 class="mb-0 fw-bold ">{{ $siswaCount }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3" id="apex-JenisKelamin"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div
                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Total Guru</h6>
                        <h4 class="mb-0 fw-bold ">{{ $guruCount }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3" id="apex-Petugas"></div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            scrollY: '200px',
            paging: false,
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
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
        var banyakLakiLakiSiswa = <?php echo json_encode(@$jumlahSiswa->where('jenis_kelamin', 'Laki-laki')->pluck('jumlah')->first()); ?>;
        var banyakPerempuanSiswa = <?php echo json_encode(@$jumlahSiswa->where('jenis_kelamin', 'Perempuan')->pluck('jumlah')->first()); ?>;

        var banyakLakiLakiGuru = <?php echo json_encode(@$jumlahGuru->where('jenis_kelamin', 'Laki-laki')->pluck('jumlah')->first()); ?>;
        var banyakPerempuanGuru = <?php echo json_encode(@$jumlahGuru->where('jenis_kelamin', 'Perempuan')->pluck('jumlah')->first()); ?>;

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
