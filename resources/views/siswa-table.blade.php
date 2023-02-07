@extends('layout.main-layout')
@section('content')
{{-- <div class="table-responsive">
    <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($siswa as $item)
                <tr class="table-primary" >
                    <td>{{$item->nis}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->gender}}</td>
                    <td>{{$item->kelas}}</td>
                    <td>{{$item->jurusan}}</td>
                    <td>{{$item->score}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
        {!! $siswa->appends(['sort' => 'votes'])->links() !!}
</div> --}}
<div class="container-fluid">
    <div class="input-group mb-3">
        <input type="input" class="form-control" id="inputGroupFile02">
        <label class="input-group" for="inputGroupFile02" type="submit  ">Seach</label>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $siswa->appends(['sort' => 'votes'])->links() !!}
</div>
@endsection

@section('script-extention')

@endsection
