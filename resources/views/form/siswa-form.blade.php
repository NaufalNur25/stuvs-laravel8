@extends('layout.main-layout')

@section('content')
<div class="container mt-5">
    <form class="row g-3">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nama Depan</label>
          <input type="text" class="form-control" id="validationDefault01" value="" required>
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Nama Belakang</label>
          <input type="text" class="form-control" id="validationDefault02" value="" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">NIS</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-graduation-cap"></i></span>
                <input type="text" class="form-control" aria-label="Text input with checkbox" name="nis" id="nis">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" name="auto_generate" id="auto_generate" type="checkbox" value=""
                    aria-label="Checkbox for following text input" data-toggle="tooltip" title="Auto-Generate">
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" id="validationDefault03" placeholder="" required>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Pilih</label>
                <select class="form-select" id="inputGroupSelect01">
                  <option selected>Jenis Kelamin</option>
                  <option value="1">Laki-laki</option>
                  <option value="2">Perempuan</option>
                </select>
              </div>
        </div>
        <div class="col-md-3">
          <label for="validationDefault05" class="form-label">Zip</label>
          <input type="text" class="form-control" id="validationDefault05" required>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Agree to terms and conditions
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
</div>
@endsection

@section('script-extention')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#auto_generate").change(function(){
                if ($(this).is(':checked')) {
                    document.getElementById('nis').value="";
                    $("#nis").attr("disabled", true);
                    console.log("#auto_generate checked");
                } else {
                    $("#nis").attr("disabled", false);
                    console.log("#auto_generate not checked");
                }
            });
        });
        console.log("#nis");
    </script>

    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
