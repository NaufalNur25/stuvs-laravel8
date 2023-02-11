@extends('layout.main-layout')
@section('content')

@auth
<form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
Hi {{ auth()->user()->username }}
@else
<a href="/login" class="btn btn-warning">Login</a>
@endauth
@endsection

@section('script-extention')

@endsection

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stuvs</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('assets/css/my-task.style.min.css')}}">
</head>
<body>

<div id="mytask-layout" class="theme-indigo">

    <!-- sidebar -->
    <div class="sidebar px-4 py-4 py-md-5 me-0">
        <div class="d-flex flex-column h-100">
            <a href="index.html" class="mb-0 brand-icon">
                <span class="logo-icon">
                    <svg  width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                        <img src="../assest/images/StuvsLogo.svg" alt="">
                    </svg>
                </span>
                <span class="logo-text">STUVS</span>
            </a>
            <!-- Menu: main ul -->

            <ul class="menu-list flex-grow-1 mt-3">
                <li><a class="m-link active" href="index.html"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i
                            class="icofont-ticket"></i> <span>Profile</span></a>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#client-Components" href="#"><i
                            class="icofont-user-male"></i> <span>Score</span></a>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#app-Components" href="#">
                        <i class="icofont-contrast"></i> <span>Preference</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="app-Components">
                        <li><a class="ms-link" href="chat.html"><span>Chat App</span></a></li>
                    </ul>
                </li>
                <li><a class="m-link" href="ui-elements/ui-alerts.html"><i class="icofont-paint"></i> <span>UI Components</span></a></li>
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
                        <div class="dropdown notifications zindex-popover">
                            <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="icofont-alarm fs-5"></i>
                                <span class="pulse-ring"></span>
                            </a>
                            <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-sm-end p-0 m-0">
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
                                                        <img class="avatar rounded-circle" src="assets/images/xs/avatar1.jpg" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Dylan Hunter</span> <small>2MIN</small></p>
                                                            <span class="">Added  2021-02-19 my-Task ui/ux Design <span class="badge bg-success">Review</span></span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <div class="avatar rounded-circle no-thumbnail">DF</div>
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane Fisher</span> <small>13MIN</small></p>
                                                            <span class="">Task added Get Started with Fast Cad project</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea Gill</span> <small>1HR</small></p>
                                                            <span class="">Quality Assurance Task Completed</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="assets/images/xs/avatar5.jpg" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane Fisher</span> <small>13MIN</small></p>
                                                            <span class="">Add New Project for App Developemnt</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="assets/images/xs/avatar6.jpg" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea Gill</span> <small>1HR</small></p>
                                                            <span class="">Add Timesheet For Rhinestone project</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="assets/images/xs/avatar7.jpg" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Zoe Wright</span> <small class="">1DAY</small></p>
                                                            <span class="">Add Calander Event</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                            <div class="u-info me-2">
                                <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">WIndah Basudara</span></p>
                                <small>Admin Profile</small>
                            </div>
                            <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/profile_av.png" alt="profile">
                            </a>
                            <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                <div class="card border-0 w280">
                                    <div class="card-body pb-0">
                                        <div class="d-flex py-1">
                                            <img class="avatar rounded-circle" src="assets/images/profile_av.png" alt="profile">
                                            <div class="flex-fill ms-3">
                                                <p class="mb-0"><span class="font-weight-bold">Bocil Kematian</span></p>
                                                <small class="">!@$!@$gmail.com</small>
                                            </div>
                                        </div>

                                        <div><hr class="dropdown-divider border-dark"></div>
                                    </div>
                                    <div class="list-group m-2 ">
                                        <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>My Task</a>
                                        <a href="members.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                                        <a href="ui-elements/auth-signin.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Signout</a>
                                        <div><hr class="dropdown-divider border-dark"></div>
                                        <a href="ui-elements/auth-signup.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- menu toggler -->
                    <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
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

        <!-- Body: Body -->
        <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row clearfix g-3">
                    <div class="col-xl-8 col-lg-12 col-md-12 flex-column">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="card">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Employees Availability</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2 row-deck">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body ">
                                                        <i class="icofont-checked fs-3"></i>
                                                        <h6 class="mt-3 mb-0 fw-bold small-14">Attendance</h6>
                                                        <span class="text-muted">400</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body ">
                                                            <i class="icofont-stopwatch fs-3"></i>
                                                        <h6 class="mt-3 mb-0 fw-bold small-14">Late Coming</h6>
                                                        <span class="text-muted">17</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body ">
                                                            <i class="icofont-ban fs-3"></i>
                                                        <h6 class="mt-3 mb-0 fw-bold small-14">Absent</h6>
                                                        <span class="text-muted">06</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body ">
                                                        <i class="icofont-beach-bed fs-3"></i>
                                                        <h6 class="mt-3 mb-0 fw-bold small-14">Leave Apply</h6>
                                                        <span class="text-muted">14</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Total Murid</h6>
                                        <h4 class="mb-0 fw-bold ">999</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-3" id="apex-MainCategories"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Top Hiring Sources</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="hiringsources"></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="row g-3 row-deck">
                            <div class="col-md-6 col-lg-6 col-xl-12">
                                <div class="card bg-primary">
                                    <div class="card-body row">
                                        <div class="col">
                                            <span class="avatar lg bg-white rounded-circle text-center d-flex align-items-center justify-content-center"><i class="icofont-file-text fs-5"></i></span>
                                            <h1 class="mt-3 mb-0 fw-bold text-white">1546</h1>
                                            <span class="text-white">Applications</span>
                                        </div>
                                        <div class="col">
                                            <img class="img-fluid" src="assets/images/interview.svg" alt="interview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-12  flex-column">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-fill">
                                            <span class="avatar lg light-success-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i class="icofont-users-alt-2 fs-5"></i></span>
                                            <div class="d-flex flex-column ps-3  flex-fill">
                                                <h6 class="fw-bold mb-0 fs-4">999</h6>
                                                <span class="text-muted">AKun Siswa</span>
                                            </div>
                                            <i class="icofont-chart-bar-graph fs-3 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-fill">
                                            <span class="avatar lg light-success-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i class="icofont-holding-hands fs-5"></i></span>
                                            <div class="d-flex flex-column ps-3 flex-fill">
                                                <h6 class="fw-bold mb-0 fs-4">101</h6>
                                                <span class="text-muted">Hired</span>
                                            </div>
                                            <i class="icofont-chart-line fs-3 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Upcomming Interviews</h6>
                                </div>
                                <div class="card-body">
                                    <div class="flex-grow-1">
                                        <div class="py-2 d-flex align-items-center border-bottom flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar2.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Natalie Gibson</h6>
                                                    <span class="text-muted">Ui/UX Designer</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 1.30 - 1:30
                                            </div>
                                        </div>
                                        <div class="py-2 d-flex align-items-center border-bottom flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar9.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Peter	Piperg</h6>
                                                    <span class="text-muted">Web Design</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 9.00 - 1:30
                                            </div>
                                        </div>
                                        <div class="py-2 d-flex align-items-center border-bottom flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar12.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Robert Young</h6>
                                                    <span class="text-muted">PHP Developer</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 1.30 - 2:30
                                            </div>
                                        </div>
                                        <div class="py-2 d-flex align-items-center border-bottom flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar8.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Victoria Vbell</h6>
                                                    <span class="text-muted">IOS Developer</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 2.00 - 3:30
                                            </div>
                                        </div>
                                        <div class="py-2 d-flex align-items-center border-bottom flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar7.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Mary Butler</h6>
                                                    <span class="text-muted">Writer</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 4.00 - 4:30
                                            </div>
                                        </div>
                                        <div class="py-2 d-flex align-items-center border-bottom flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar3.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Youn Bel</h6>
                                                    <span class="text-muted">Unity 3d</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 7.00 - 8.00
                                            </div>
                                        </div>
                                        <div class="py-2 d-flex align-items-center  flex-wrap">
                                            <div class="d-flex align-items-center flex-fill">
                                                <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/lg/avatar2.jpg" alt="profile">
                                                <div class="d-flex flex-column ps-3">
                                                    <h6 class="fw-bold mb-0 small-14">Gibson Butler</h6>
                                                    <span class="text-muted">Networking</span>
                                                </div>
                                            </div>
                                            <div class="time-block text-truncate">
                                                <i class="icofont-clock-time"></i> 8.00 - 9.00
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="card light-danger-bg">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Top Perfrormers</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-2">
                                        <p>You have 140 <span class="fw-bold">influencers </span> in your company.</p>
                                        <div class="d-flex  justify-content-between text-center">
                                            <div class="">
                                                <h3 class="fw-bold">350</h3>
                                                <span class="small">New Task</span>
                                            </div>
                                            <div class="">
                                                <h3 class="fw-bold">130</h3>
                                                <span class="small">Task Completed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-10">
                                        <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-6 row-deck top-perfomer">
                                            <div class="col">
                                                <div class="card shadow">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <img class="avatar lg rounded-circle img-thumbnail mx-auto" src="assets/images/lg/avatar2.jpg" alt="profile">
                                                        <h6 class="fw-bold my-2 small-14">Luke Short</h6>
                                                        <span class="text-muted mb-2">@Short</span>
                                                        <h4 class="fw-bold text-primary fs-3">80%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card shadow">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <img class="avatar lg rounded-circle img-thumbnail mx-auto" src="assets/images/lg/avatar5.jpg" alt="profile">
                                                        <h6 class="fw-bold my-2 small-14">John Hard</h6>
                                                        <span class="text-muted mb-2">@rdacre</span>
                                                        <h4 class="fw-bold text-primary fs-3">70%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card shadow">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <img class="avatar lg rounded-circle img-thumbnail mx-auto" src="assets/images/lg/avatar8.jpg" alt="profile">
                                                        <h6 class="fw-bold my-2 small-14">Paul Rees</h6>
                                                        <span class="text-muted mb-2">@Rees</span>
                                                        <h4 class="fw-bold text-primary fs-3">77%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card shadow">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <img class="avatar lg rounded-circle img-thumbnail mx-auto" src="assets/images/lg/avatar9.jpg" alt="profile">
                                                        <h6 class="fw-bold my-2 small-14">Rachel Parr</h6>
                                                        <span class="text-muted mb-2">@Parr</span>
                                                        <h4 class="fw-bold text-primary fs-3">85%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card shadow">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <img class="avatar lg rounded-circle img-thumbnail mx-auto" src="assets/images/lg/avatar12.jpg" alt="profile">
                                                        <h6 class="fw-bold my-2 small-14">Eric Reid</h6>
                                                        <span class="text-muted mb-2">@Eric</span>
                                                        <h4 class="fw-bold text-primary fs-3">95%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card shadow">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <img class="avatar lg rounded-circle img-thumbnail mx-auto" src="assets/images/lg/avatar3.jpg" alt="profile">
                                                        <h6 class="fw-bold my-2 small-14">Jan Ince</h6>
                                                        <span class="text-muted mb-2">@Ince</span>
                                                        <h4 class="fw-bold text-primary fs-3">97%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div><!-- Row End -->
            </div>
        </div>

        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

<!-- Plugin Js-->
<script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="{{asset('../js/template.js')}}"></script>
<script src="{{asset('../js/page/hr.js')}}"></script>
</body>
</html>

