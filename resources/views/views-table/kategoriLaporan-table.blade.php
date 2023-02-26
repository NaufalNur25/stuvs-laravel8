@extends('layout.master-layout')

@section('content')
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Kategori</h3>
                    <a href="{{ route('kategoriLaporan.create') }}" class="btn btn-dark btn-set-task w-sm-100"><i
                        class="icofont-plus-circle me-2 fs-6"></i>Tambah Kategori</a>
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row g-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Pelanggaran</th>
                                    <th>Deskripsi Pelanggaran</th>
                                    <th class="text-center">Jenis Pelanggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $key => $item)
                                <tr>
                                    <td><a href="{{ route('kategoriLaporan.edit', encrypt($item->id)) }}"><i class="icofont-edit text-success"></i></a> {{$item->nama_pelanggaran}}</td>
                                    <td>{{$item->deskripsi_pelanggaran}}</td>
                                    <td class="text-center"><span class="badge bg-{{$color[$key]}} p-2">{{$item->jenis_pelanggaran}}</span></td>
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
       .addClass( 'nowrap' )
       .dataTable( {
           responsive: true,
           columnDefs: [
               { targets: [-1, -3], className: 'dt-body-right' }
           ]
       });
   });
</script>
@endsection
