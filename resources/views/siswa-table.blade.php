@extends('layout.master-layout')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <div class="col-auto d-flex w-sm-100">
                            <a href="{{ route('siswa.create') }}" class="btn btn-dark btn-set-task w-sm-100"><i
                                    class="icofont-plus-circle me-2 fs-6"></i>Tambah Siswa</a>
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
                                        <th>Score</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $item)
                                        <tr>
                                            <td><a href="ticket-detail.html" class="fw-bold text-secondary">{{ $item->nis }}</a></td>
                                            <td><span class="fw-bold ms-1">{{ $item->nama_lengkap }}</span></td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->kelas->nama_kelas }}</td>
                                            <td>{{ $item->kelas->jurusan->nama_jurusan }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="{{ route('siswa.edit', encrypt($item->id)) }}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                                    <button type="button" class="btn btn-outline-secondary" onclick='confirmDelete(`{{$item->id}}`, `{{$item->nis}}`)'><i class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
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

    <script>
        function confirmDelete(id, nis) {
        let text = `Kamu yakin? Ini akan menghapus siswa ${nis} untuk selamanya.`;
        if (confirm(text) == true) {
            location.href = `http://127.0.0.1:8000/siswa/delete/${id}`;
        } else {
            text = "You canceled!";
        }
        document.getElementById("demo").innerHTML = text;
        }
    </script>
@endsection
