@extends('layout.master-layout')
<<<<<<< Updated upstream
@section('content')

=======

@section('content')
>>>>>>> Stashed changes

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">



<<<<<<< Updated upstream
<title>Profile</title>
=======
<title>Edit Profile</title>
>>>>>>> Stashed changes
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
<div class="account-settings">
<div class="user-profile">
<div class="user-avatar">
<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
</div>
<<<<<<< Updated upstream
<h5 class="user-name">Admin Stuvs</h5>
=======
<h5 class="user-name">Admin</h5>
>>>>>>> Stashed changes
<h6 class="user-email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2e575b45476e634f56594b4242004d4143">[email&#160;protected]</a></h6>
</div>
<div class="about">
<h5>About</h5>
<p>I'm Naufal as Admin.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
<div class="card-body">
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-2 text-primary">Personal Details</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="fullName">Full Name</label>
<input type="text" class="form-control" id="fullName" placeholder="Enter full name">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="eMail">Email</label>
<input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<<<<<<< Updated upstream
<label for="phone">Phone</label>
=======
<label for="phone">NIS</label>
>>>>>>> Stashed changes
<input type="text" class="form-control" id="phone" placeholder="Enter phone number">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<<<<<<< Updated upstream
<label for="nis">NIS</label>
=======
<label for="website">NIS</label>
>>>>>>> Stashed changes
<input type="url" class="form-control" id="nis" placeholder="Enter your NIS">
</div>
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mt-3 mb-2 text-primary">Address</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="Street">Street</label>
<input type="name" class="form-control" id="Street" placeholder="Enter Street">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="ciTy">City</label>
<input type="name" class="form-control" id="ciTy" placeholder="Enter City">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="sTate">State</label>
<input type="text" class="form-control" id="sTate" placeholder="Enter State">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="zIp">Zip Code</label>
<input type="text" class="form-control" id="zIp" placeholder="Zip Code">
</div>
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="text-right">
<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


</style>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">

</script>
</body>
</html>
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
@endsection