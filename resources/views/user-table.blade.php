@extends('layout.master-layout')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <div class="col-auto d-flex w-sm-100">
                            <a href="{{ route('user.role') }}" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Tambah Role</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    @error('username')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                    </div>
                    @enderror
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover table-striped align-middle mb-0 text-center"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Authorization Role</th>
                                        <th>Dibuat Pada</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td><img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="{{ $item->username }}"><span class="fw-bold ms-1"> {{ $item->username }}</span></td>
                                            <td>{{ $item->siswa->nama_lengkap }}</td>
                                            <td>Administrator</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td><span class="badge bg-warning">OFFLINE</span></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editholiday"><i class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Edit Holiday-->
                                        <div class="modal fade" id="editholiday" tabindex="-1"  aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title  fw-bold" id="editholidayLabel">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('user.update', encrypt($item->id))}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInputname" class="form-label">Username</label>
                                                            <input type="text" name="username" class="form-control" id="exampleFormControlInputname" value="{{ $item->username }}">
                                                        </div>
                                                        {{-- <div class="mb-3">
                                                            <label for="roleUser" class="form-label">User Role</label>
                                                            <select name="role" class="form-select" id="roleUser" aria-label="Default select example">
                                                                @foreach ($role as $role_item)
                                                                <option value="{{$role_item->id}}"
                                                                    {{ implode(', ', $item->getRoleNames()->toArray()) == $role_item->name ? 'selected' : '' }}>{{ $role_item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput0243" class="form-label">Dibuat Pada</label>
                                                            <input type="date" class="form-control" id="exampleFormControlInput0243" value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-m-d') }}" disabled>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
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
