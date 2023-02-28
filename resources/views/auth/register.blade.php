@extends('layout.auth-layout')

@section('content')
    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5">

        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="">
                                <img src="{{ asset('assets/images/StuvsLogoWithText.png') }}" alt="login-img" style="width: 25rem">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 50rem;">
                            <!-- Form -->
                            <form action="{{ route('register.session') }}" method="post" class="row g-1 p-3 p-md-4">
                                @csrf
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <h1>Create your account</h1>
                                    <span>Free access to our dashboard.</span>
                                </div>
                                <div class="col-5">
                                    <div class="mb-2">
                                        <label class="form-label">NIP</label>
                                        <input name="nip" type="text" placeholder="NIP"
                                            class="form-control form-control-lg @error('nip') is-invalid @enderror" autofocus required value="{{ old('nip') }}">
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="mb-2">
                                        <label class="form-label">Username</label>
                                        <input name="username" type="text"
                                            class="form-control form-control-lg @error('username') is-invalid @enderror"
                                            placeholder="Name01" autofocus required value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input name="email" type="email"
                                            class="form-control form-control-lg @error('email')
                                        is-invalid
                                    @enderror"
                                            placeholder="name@example.com" required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Password</label>
                                        <input name="password" type="password"
                                            class="form-control form-control-lg @error('password')
                                        is-invalid
                                        @enderror"
                                            placeholder="8+ characters required" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Confirm password</label>
                                        <input name="password_confirmation" type="password"
                                            class="form-control form-control-lg @error('password_confirmation')
                                        is-invalid
                                        @enderror"
                                            placeholder="8+ characters required" required>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="validating">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I accept the <a href="#" title="Terms and Conditions"
                                                class="text-secondary">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button id="submitBtn" type="submit"
                                        class="btn btn-lg btn-block btn-light lift text-uppercase" alt="SIGNUP"
                                        disabled>SIGN UP</a>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Already have an account? <a href="{{ route('login') }}"
                                            title="Sign in" class="text-secondary">Sign in here</a></span>
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
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

    <script>
        document.getElementById("validating").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("submitBtn").disabled = false;
            } else {
                document.getElementById("submitBtn").disabled = true;
            }
        });
    </script>
@endsection
