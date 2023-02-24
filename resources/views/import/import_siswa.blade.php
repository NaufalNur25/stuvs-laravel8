@extends('layout.master-layout')
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{ route('import.siswa') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <div class="mb-5">
                    <h5 for="formFile" class="form-label">Siswa Excel Import</h5>
                    <div class="wrapper">
                        <div class="boxfile">
                            <div class="drop-zone">
                                <span class="drop-zone__prompt"><i class="fa fa-cloud-upload"></i> Drop file here or click to upload</span>
                                <input type="file" name="file[]" id="formFile" class="form-control drop-zone__input" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loadingCenter">
                    <button class="loadingCenterBtn btn btn-success" type="submit" id="submitBtn">Import Data</button>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/Main.js') }}"></script>
    <script>
        $(function() {

            var loadingCenterBtn = document.querySelector('.loadingCenterBtn');

            loadingCenterBtn.addEventListener("click", function() {
                loadingCenterBtn.innerHTML = "Loading...";
                loadingCenterBtn.classList.add('spinning');

                setTimeout(
                    function() {
                        loadingCenterBtn.classList.remove('spinning');
                        loadingCenterBtn.innerHTML = "Loading...";

                    }, 6000);
            }, false);

        });
    </script>
@endsection
