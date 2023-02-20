<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>STUVS - Index</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
    @if(Request::is('form/*'))
    <link rel="stylesheet" href="{{asset('assets/plugin/parsleyjs/css/parsley.css')}}">
    @endif
    {{-- awsome font --}}
    <script src="https://kit.fontawesome.com/b397b32336.js" crossorigin="anonymous"></script>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/my-task.style.min.css') }}">
</head>

<body>
    {{-- {{dd(Request::is('form/*'))}} --}}
    <div id="mytask-layout" class="theme-indigo">
        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-5 me-0">
            <div class="d-flex flex-column h-100">
                <a href="/" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="500" zoomAndPan="magnify" viewBox="0 0 375 374.999991" height="500"
                            preserveAspectRatio="xMidYMid meet" version="1.0">
                            <defs>
                                <clipPath id="326bf7632a">
                                    <path
                                        d="M 41 59.046875 L 334 59.046875 L 334 316.296875 L 41 316.296875 Z M 41 59.046875 "
                                        clip-rule="nonzero" />
                                </clipPath>
                            </defs>
                            <g clip-path="url(#326bf7632a)">
                                <path fill="#e6ddd1"
                                    d="M 320.574219 142.53125 C 309.863281 137.382812 295.140625 144.179688 282.269531 158.488281 C 282.3125 157.300781 282.355469 156.109375 282.355469 154.90625 C 282.355469 101.949219 239.464844 59.015625 186.582031 59.015625 C 136.121094 59.015625 94.765625 98.105469 91.085938 147.707031 C 78.613281 134.613281 64.679688 128.59375 54.425781 133.523438 C 38.644531 141.109375 37.585938 171.726562 52.046875 201.894531 C 62.1875 223.074219 77.28125 238.375 90.828125 243.035156 L 90.828125 299.933594 C 94.964844 291.589844 103.085938 285.9375 112.40625 285.9375 C 125.953125 285.9375 136.9375 297.871094 136.9375 312.597656 C 136.9375 312.738281 136.921875 312.867188 136.921875 313.011719 L 137.050781 313.011719 C 138.253906 299.503906 148.722656 288.9375 161.464844 288.9375 C 172.765625 288.9375 182.273438 297.238281 185.109375 308.523438 C 187.972656 297.238281 197.464844 288.9375 208.765625 288.9375 C 222.3125 288.9375 233.292969 300.867188 233.292969 315.59375 C 233.292969 315.835938 233.28125 316.082031 233.265625 316.324219 L 233.4375 316.324219 C 234.726562 302.929688 245.152344 292.464844 257.824219 292.464844 C 268.75 292.464844 278 300.25 281.179688 310.976562 C 281.925781 309.46875 282.355469 307.777344 282.355469 305.972656 L 282.355469 252.613281 C 296.34375 248.757812 312.355469 233.027344 322.953125 210.902344 C 337.414062 180.730469 336.355469 150.117188 320.574219 142.53125 "
                                    fill-opacity="1" fill-rule="nonzero" />
                            </g>
                            <path fill="#231f1f"
                                d="M 212.746094 193.5625 C 212.746094 217.28125 200.03125 236.496094 184.363281 236.496094 C 168.683594 236.496094 155.980469 217.28125 155.980469 193.5625 C 155.980469 169.847656 168.683594 150.632812 184.363281 150.632812 C 200.03125 150.632812 212.746094 169.847656 212.746094 193.5625 "
                                fill-opacity="1" fill-rule="nonzero" />
                            <path fill="#ec1b24"
                                d="M 184.363281 201.136719 C 174.925781 201.136719 166.578125 208.105469 161.421875 218.816406 C 166.578125 229.527344 174.925781 236.496094 184.363281 236.496094 C 193.800781 236.496094 202.148438 229.527344 207.304688 218.816406 C 202.148438 208.105469 193.800781 201.136719 184.363281 201.136719 "
                                fill-opacity="1" fill-rule="nonzero" />
                            <path fill="#231f1f"
                                d="M 155.980469 127.847656 C 155.980469 132.378906 152.316406 136.0625 147.789062 136.0625 C 143.265625 136.0625 139.585938 132.378906 139.585938 127.847656 C 139.585938 123.316406 143.265625 119.628906 147.789062 119.628906 C 152.316406 119.628906 155.980469 123.316406 155.980469 127.847656 "
                                fill-opacity="1" fill-rule="nonzero" />
                            <path fill="#231f1f"
                                d="M 229.140625 127.847656 C 229.140625 132.378906 225.460938 136.0625 220.9375 136.0625 C 216.410156 136.0625 212.746094 132.378906 212.746094 127.847656 C 212.746094 123.316406 216.410156 119.628906 220.9375 119.628906 C 225.460938 119.628906 229.140625 123.316406 229.140625 127.847656 "
                                fill-opacity="1" fill-rule="nonzero" />
                        </svg>
                    </span>
                    <span class="logo-text" >STUVS</span>
                </a>
                <!-- Menu: main ul -->

                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link <?php if (Route::is('index')) { echo 'active';} ?>" href="{{ route('index') }}"><i class="icofont-home fs-5"></i><span>Dashboard</span></a></li>

                    <li class="collapsed">
                        <a class="m-link <?php if (Route::is('siswa') || Route::is('siswa.create') || Route::is('siswa.edit') || Route::is('jurusan') || Route::is('user') || (Route::is('guru'))) { echo 'active'; } ?>" href="{{ route('siswa') }}" data-bs-toggle="collapse" data-bs-target="#emp-Components"><i
                                class="icofont-users-alt-5"></i> <span>Manage</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse <?php if (Route::is('guru') || Route::is('siswa') || Route::is('siswa.create') || Route::is('siswa.edit') || Route::is('jurusan') || Route::is('user')) { echo 'show'; } ?>" id="emp-Components">
                            <li><a class="ms-link <?php if (Route::is('user')) { echo 'active'; } ?>" href="{{ route('user') }}"><span>User</span></a></li>
                            <li><a class="ms-link <?php if (Route::is('guru')) { echo 'active'; } ?>" href="{{ route('guru') }}"><span>Guru</span></a></li>
                            <li><a class="ms-link <?php if (Route::is('siswa') || Route::is('siswa.create') || Route::is('siswa.edit')) { echo 'active'; } ?>" href="{{ route('siswa') }}"><span>Siswa</span></a></li>
                            <li><a class="ms-link <?php if (Route::is('kelas')) { echo 'active'; } ?>" href="{{route('kelas')}}"> <span>Kelas</span></a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" href="#" data-bs-toggle="collapse" data-bs-target="#client-Components"><i
                                class="icofont-dart"></i> <span>Laporan</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="client-Components">
                            <li><a class="ms-link" href="#"><span>User</span></a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" href="#"><i class="icofont-contrast"></i> <span>Preference</span><span
                                class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="app-Components">
                            <li>
                                <a class="ms-link" href="chat.html"><span>Chat App</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="m-link" href="ui-elements/ui-alerts.html"><i class="icofont-paint"></i><span>UI
                                Components</span></a>
                    </li>
                </ul>

                <!-- Theme: Switch Theme -->
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-center">
                        <div class="form-check form-switch theme-switch">
                            <input class="form-check-input" type="checkbox" id="theme-switch">
                            <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                        </div>
                    </li>
                </ul>

                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">
                            @include('partials.navbar')
                            @if (Request::is('form/*'))
                            @include('partials.btn-back')
                            @else
                            @include('partials.user-online')
                            @endif
                    </div>
                </nav>
            </div>

            {{-- For Form --}}
            @if(Request::is('form/*'))
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent border-bottom">
                        <h3 class="fw-bold mb-0">Forms</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->

            <div class="row align-item-center">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold "></h6>
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            @else
            @yield('content')
            @endif
        </div>

        <!-- Jquery Core Js -->
        <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

        <!-- Plugin Js-->
        <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
        @if(Request::is('form/*'))
        <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>
        <script>
            $(function() {
                // initialize after multiselect
                $('#basic-form').parsley();
            });
        </script>
        @endif

        <!-- Jquery Page Js -->
        <script src="{{ asset('assets/js/template.js') }}"></script>


        <!-- Plugin Js-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        @yield('script')
</body>

</html>
