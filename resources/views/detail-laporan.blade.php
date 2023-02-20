@extends('layout.master-layout')
@section('content')

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Tickets</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/plugin/datatables/dataTables.bootstrap5.min.css">
    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/my-task.style.min.css">
</head>
<body>
        <!-- Body: Body -->
                <div class="body d-flex py-lg-3 py-md-2">
                    <div class="container-xxl">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="card border-0 mb-4 no-bg">
                                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                                        <h3 class=" fw-bold flex-fill mb-0">Nama Siswa</h3>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->
                        <div class="row g-3">
                            <div class="col-xl-8 col-lg-12 col-md-12">
                                <div class="card teacher-card  mb-3">
                                    <div class="card-body d-flex teacher-fulldeatil">
                                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                            <a href="#">
                                                <img src="assets/images/lg/avatar3.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                            </a>
                                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                                <h6 class="mb-0 fw-bold d-block fs-6">Tharissa Shalsabila Trihapsari</h6>
                                                <span class="text-muted small">202111866</span>
                                            </div>
                                        </div>

                                            <div class="row g-2 pt-2">
                                                <div class="col-xl-5">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-ui-touch-phone"></i>
                                                        <span class="ms-2 small">085317277117 </span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-email"></i>
                                                        <span class="ms-2 small">shalsabilathar03@gmail.com</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-birthday-cake"></i>
                                                        <span class="ms-2 small">03/08/2005</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-address-book"></i>
                                                        <span class="ms-2 small">Baleendah, Bandung.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                                <div class="info-header">
                                                    <h6 class="mb-0 fw-bold ">Detail Pelanggaran</h6>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Waktu</th>
                                                            <th>Keterangan Pelanggaran</th>
                                                            <th>Jenis Pelanggaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="invoices.html" class="fw-bold text-secondary">21 Februari 2023</a></td>
                                                            <td><a href="projects.html">07.15</a></td>
                                                            <td>Terlambat</td>
                                                            <td><span class="badge bg-warning">Rendah</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Row End -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>

<!-- Plugin Js-->
<script src="assets/bundles/dataTables.bundle.js"></script>

<!-- Jquery Page Js -->
<script src="../js/template.js"></script>
<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
        $('.deleterow').on('click',function(){
        var tablename = $(this).closest('table').DataTable();
        tablename
                .row( $(this)
                .parents('tr') )
                .remove()
                .draw();

        } );
    });
</script>
</body>
</html>

@endsection

