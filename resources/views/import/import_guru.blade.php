@extends('layout.master-layout')
@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{ route('import.guru') }}" method="post" enctype="multipart/form-data" id="import-form">
                @csrf
                <div class="mb-5">
                    <h5 for="formFile" class="form-label">Guru Excel Import</h5>
                    <div class="wrapper">
                        <div class="boxfile">
                            <div class="drop-zone">
                                {{-- <span class="drop-zone__prompt"><i class="fa fa-cloud-upload"></i> Drop file here or click
                                    to upload</span>
                                <input type="file" name="file" id="formFile" class="form-control drop-zone__input"
                                    multiple> --}}

                                    <span class="drop-zone__prompt"><i class="fa fa-cloud-upload"></i> Drop file here or click
                                        to upload</span>
                                    <input type="file" name="file" id="formFile" class="form-control drop-zone__input"
                                        multiple>
                            </div>
                            {{-- <div id="filewrapper">
                                <div class="mb-5">
                                    <label for="uploaded" class="">List Document</label>
                                    <div class="showfilebox">
                                        <div class="left">
                                            <h5>SMKN4BDG.png</h5>
                                        </div>
                                        <div class="right">
                                            <span>&#215</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <div class="loadingCenter">
                    <button class="loadingCenterBtn btn btn-success" type="submit" id="submitBtn"
                        onclick="myLoading()">Import Data</button>

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
