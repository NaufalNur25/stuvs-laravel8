@extends('layout.master-layout')
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Laporan - Detail</h3>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-outline-danger px-3" href="#"
                                role="button">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        <div class="row g-3">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body d-flex teacher-fulldeatil">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <a href="#">
                                <img src="{{ asset('assets/images/lg/avatar3.jpg') }}" alt=""
                                    class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">{{$siswa->nama_lengkap}}</h6>
                                <span class="text-muted small">{{$siswa->nis}}</span>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-4 ps-sm-4 ps-4 w-50">
                            <br>
                            <h6 class="mb-0 mt-2 fw-bold d-block fs-6 mt-md-3">{{$siswa->kelas->nama_kelas}}</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Siswa - {{$guru ? $guru->nama_lengkap : ''}}</span>
                            <div class="row pt-2">
                                <div class="col-xl-12">
                                    <div class="align-items-center">
                                        <i class="icofont-ui-touch-phone"></i>
                                        <span class="ms-2 small">Laki-laki</span>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="align-items-center">
                                        <i class="icofont-email"></i>
                                        <span class="ms-2 small">ryanogden@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Kategori Laporan</th>
                                <th>Deskripsi Laporan</th>
                                <th>Dilaporan oleh</th>
                                <th>Tanggal Kejadian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">
                                <span class="badge bg-success p-2">Ringan</span>
                            </td>
                            <td>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                            </td>
                            <td>-</td>
                            <td>28 Februari 2023 12:41</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                    <form onclick="return confirm('Kamu Yakin? Data ini akan terhapus selamanya.')" action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary"><i class="icofont-ui-delete text-danger"></i></button>
                                    </form>
                                </div>
                            </td>
                          </tr>
                        </tbody>
                    </table>
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
@endsection
