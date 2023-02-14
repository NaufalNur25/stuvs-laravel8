@extends('layout.auth-layout')

@section('content')
    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5 bg-color-custome">

        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <!-- Image block -->
                            <div class="">
                                <img src="{{asset('assets/images/StuvsLogoWithText.png')}}" alt="login-img" style="width: 25rem">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form action="{{route('signin.auth')}}" method="post" class="row g-1 p-3 p-md-4">
                                @csrf
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <h1>Sign in</h1>
                                    <span>Free access to our dashboard.</span>
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img class="avatar xs me-2" src="{{asset('assets/images/google.svg')}}" alt="Image Description">
                                            Sign in with Google
                                        </span>
                                    </a>
                                    <span class="dividers text-muted mt-4">OR</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input name="email" type="email" class="form-control form-control-lg @error('email')
                                        is-invalid
                                    @enderror" placeholder="name@example.com" id="email" aria-describedby="emailHelp" autofocus required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password
                                                <a class="text-secondary" href="auth-password-reset.html">Forgot Password?</a>
                                            </span>
                                        </div>
                                        <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="***************" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" atl="signin">SIGN IN</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Don't have an account yet? <a href="{{route('signup.index')}}" class="text-secondary">Sign up here</a></span>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
@endsection
