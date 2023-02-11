<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-5 me-0">
    <div class="d-flex flex-column h-100">
        <a href="index.html" class="mb-0 brand-icon">
            <span class="logo-icon">
                <img src="{{asset('assets/images/StuvsLogo.svg')}}" alt="Logo Stuvs" width="70" height="70">
            </span>
            <span class="logo-text">STUVS</span>
        </a>
        <!-- Menu: main ul -->

        <ul class="menu-list flex-grow-1 mt-3">
            <li>
                <a class="m-link <?php if (Route::is('index')) { echo 'active'; } ?>" href="{{route('index')}}"><i class="icofont-home fs-5"></i><span>Dashboard</span></a>
            </li>

            <li>
                <a class="m-link <?php if (Route::is('siswa')) { echo 'active'; } ?>" href="{{route('siswa')}}"><i class="icofont-user-male"></i><span>Siswa</span></a>
            </li>
            <li>
                <a class="m-link" href="#"><i class="icofont-ticket"></i><span>Score</span></a>
            </li>
            <li class="collapsed">
                <a class="m-link" href="#"><i class="icofont-contrast"></i> <span>Preference</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="app-Components">
                    <li>
                        <a class="ms-link" href="chat.html"><span>Chat App</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="m-link" href="ui-elements/ui-alerts.html"><i class="icofont-paint"></i><span>UI Components</span></a>
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

                <!-- header rightbar icon -->
                <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                    <div class="d-flex">

                    </div>
                    <div class="dropdown notifications zindex-popover">
                        <a class="nav-link dropdown-toggle pulse" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="icofont-alarm fs-5"></i>
                            <span class="pulse-ring"></span>
                        </a>
                        <div id="NotificationsDiv"
                            class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-sm-end p-0 m-0">
                            <div class="card border-0 w380">
                                <div class="card-header border-0 p-3">
                                    <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                                        <span>Notifications</span>
                                        <span class="badge text-white">11</span>
                                    </h5>
                                </div>
                                <div class="tab-content card-body">
                                    <div class="tab-pane fade show active">
                                        <ul class="list-unstyled list mb-0">
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="">
                                                    <div class="flex-fill ms-2">
                                                        <p class="d-flex justify-content-between mb-0 "><span
                                                                class="font-weight-bold">Dylan Hunter</span>
                                                            <small>2MIN</small>
                                                        </p>
                                                        <span class="">Added 2021-02-19 my-Task ui/ux Design
                                                            <span class="badge bg-success">Review</span></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <div class="avatar rounded-circle no-thumbnail">DF</div>
                                                    <div class="flex-fill ms-2">
                                                        <p class="d-flex justify-content-between mb-0 "><span
                                                                class="font-weight-bold">Diane Fisher</span>
                                                            <small>13MIN</small>
                                                        </p>
                                                        <span class="">Task added Get Started with Fast Cad
                                                            project</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="{{asset('assets/images/xs/avatar3.jpg')}}" alt="">
                                                    <div class="flex-fill ms-2">
                                                        <p class="d-flex justify-content-between mb-0 "><span
                                                                class="font-weight-bold">Andrea Gill</span>
                                                            <small>1HR</small>
                                                        </p>
                                                        <span class="">Quality Assurance Task Completed</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="{{asset('assets/images/xs/avatar5.jpg')}}" alt="">
                                                    <div class="flex-fill ms-2">
                                                        <p class="d-flex justify-content-between mb-0 "><span
                                                                class="font-weight-bold">Diane Fisher</span>
                                                            <small>13MIN</small>
                                                        </p>
                                                        <span class="">Add New Project for App
                                                            Developemnt</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2 mb-1 border-bottom">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="{{asset('assets/images/xs/avatar6.jpg')}}" alt="">
                                                    <div class="flex-fill ms-2">
                                                        <p class="d-flex justify-content-between mb-0 "><span
                                                                class="font-weight-bold">Andrea Gill</span>
                                                            <small>1HR</small>
                                                        </p>
                                                        <span class="">Add Timesheet For Rhinestone
                                                            project</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-2">
                                                <a href="javascript:void(0);" class="d-flex">
                                                    <img class="avatar rounded-circle"
                                                        src="{{asset('assets/images/xs/avatar7.jpg')}}" alt="">
                                                    <div class="flex-fill ms-2">
                                                        <p class="d-flex justify-content-between mb-0 "><span
                                                                class="font-weight-bold">Zoe Wright</span>
                                                            <small class="">1DAY</small>
                                                        </p>
                                                        <span class="">Add Calander Event</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="card-footer text-center border-top-0" href="#"> View all
                                    notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                        <div class="u-info me-2">
                            <p class="mb-0 text-end line-height-sm"><span class="font-weight-bold">Dylan Hunter</span></p>
                            <small>Admin Profile</small>
                        </div>
                        <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
                            data-bs-toggle="dropdown" data-bs-display="static">
                            <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('assets/images/profile_av.png')}}" alt="profile">
                        </a>
                        <div
                            class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                            <div class="card border-0 w280">
                                <div class="card-body pb-0">
                                    <div class="d-flex py-1">
                                        <img class="avatar rounded-circle" src="{{asset('assets/images/profile_av.png')}}"
                                            alt="profile">
                                        <div class="flex-fill ms-3">
                                            <p class="mb-0"><span class="font-weight-bold">Dylan Hunter</span>
                                            </p>
                                            <small class="">Dylan.hunter@gmail.com</small>
                                        </div>
                                    </div>

                                    <div>
                                        <hr class="dropdown-divider border-dark">
                                    </div>
                                </div>
                                <div class="list-group m-2 ">
                                    <a href="task.html"
                                        class="list-group-item list-group-item-action border-0 "><i
                                            class="icofont-tasks fs-5 me-3"></i>My Task</a>
                                    <a href="members.html"
                                        class="list-group-item list-group-item-action border-0 "><i
                                            class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                                    <a href="ui-elements/auth-signin.html"
                                        class="list-group-item list-group-item-action border-0 "><i
                                            class="icofont-logout fs-6 me-3"></i>Signout</a>
                                    <div>
                                        <hr class="dropdown-divider border-dark">
                                    </div>
                                    <a href="ui-elements/auth-signup.html"
                                        class="list-group-item list-group-item-action border-0 "><i
                                            class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- menu toggler -->
                <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button"
                    data-bs-toggle="collapse" data-bs-target="#mainHeader">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- main menu Search-->
                <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                    <div class="input-group flex-nowrap input-group-lg">
                        <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                        <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                        <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

            </div>
        </nav>
    </div>
