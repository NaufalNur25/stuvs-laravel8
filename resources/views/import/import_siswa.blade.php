@extends('layout.main-layout')
@section('content')
<form action="{{ route('import.siswa') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Siswa Excel Import</label>
        <input class="form-control" type="file" id="formFile" name="file">
    </div>
    <button class="btn btn-success">
        Import Siswa Data
     </button>
</form>
@endsection
