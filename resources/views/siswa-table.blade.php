@extends('layout.main-layout')

@section('content')
    <div id="mytask-layout" class="theme-indigo">
        @include('partials.slide')
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <div class="avatar-list avatar-list-stacked px-3">
                                    <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="">
                                    <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="">
                                    <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar3.jpg')}}" alt="">
                                    <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar4.jpg')}}" alt="">
                                    <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar7.jpg')}}" alt="">
                                    <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar8.jpg')}}" alt="">
                                </div>
                                <div class="col-auto d-flex w-sm-100">
                                    <a href="{{ route('siswa.create') }}" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Tambah Siswa</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover table-striped align-middle mb-0"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $item)
                                            <tr>
                                                <td><a href="ticket-detail.html" class="fw-bold text-secondary">{{ $item->nis }}</a></td>
                                                <td><img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="{{ $item->nama_lengkap }}"><span class="fw-bold ms-1"> {{ $item->nama_lengkap }}</span></td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ $item->kelas->nama_kelas }}</td>
                                                <td>{{ $item->kelas->jurusan->nama_jurusan }}</td>
                                                <td>{{ $item->nilai }}</td>
                                                <td><span class="badge bg-warning">OFFLINE</span></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edittickit"><i class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
                </div>
            </div>

            <!-- Add Siswa-->
            <div class="modal fade" id="tickadd" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tickit Add</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="sub" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="sub">
                            </div>
                            <div class="deadline-form">
                                <form>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label for="depone" class="form-label">Assign Name</label>
                                            <input type="text" class="form-control" id="depone">
                                        </div>
                                        <div class="col">
                                            <label for="deptwo" class="form-label">Creted Date</label>
                                            <input type="date" class="form-control" id="deptwo">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option selected>In Progress</option>
                                    <option value="1">Completed</option>
                                    <option value="2">Wating</option>
                                    <option value="3">Decline</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                            <button type="submit" class="btn btn-primary">sent</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Tickit-->
            <div class="modal fade" id="edittickit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="edittickitLabel"> Tickit Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="sub1" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="sub1"
                                    value="punching time not proper">
                            </div>
                            <div class="deadline-form">
                                <form>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label for="depone11" class="form-label">Assign Name</label>
                                            <input type="text" class="form-control" id="depone11"
                                                value="Victor Rampling">
                                        </div>
                                        <div class="col">
                                            <label for="deptwo56" class="form-label">Creted Date</label>
                                            <input type="date" class="form-control" id="deptwo56"
                                                value="2021-02-25">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option selected>Completed</option>
                                    <option value="1">In Progress</option>
                                    <option value="2">Wating</option>
                                    <option value="3">Decline</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                            <button type="submit" class="btn btn-primary">sent</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-extention')
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <!-- Jquery Page Js -->
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script>
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });
            $('.deleterow').on('click', function() {
                var tablename = $(this).closest('table').DataTable();
                tablename
                    .row($(this)
                        .parents('tr'))
                    .remove()
                    .draw();

            });
        });
    </script>
@endsection
