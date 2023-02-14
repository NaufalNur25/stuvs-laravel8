@extends('layout.master-layout')
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{ route('import.siswa') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Siswa Excel Import</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
                <button class="btn btn-success" type="submit" id="submitBtn" style="visibility: visibility;">Import Data</button>
                <button class="btn btn-success" id="loading" disabled >
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script>
        $(document).ready(function() {
            $('#import-form').submit(function() {
                $("#loading").show();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    success: function(result) {
                        // do something after import success
                        $('#loading').style.visibility = "hidden";
                    }
                });
                return false;
            });
        });
    </script> --}}
@endsection
