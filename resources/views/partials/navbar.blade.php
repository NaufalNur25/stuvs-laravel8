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
                                        src="{{ asset('assets/images/xs/avatar1.jpg') }}"
                                        alt="">
                                    <div class="flex-fill ms-2">
                                        <p class="d-flex justify-content-between mb-0 "><span
                                                class="font-weight-bold">Dylan Hunter</span>
                                            <small>2MIN</small>
                                        </p>
                                        <span class="">Added 2021-02-19 my-Task ui/ux
                                            Design
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
                                        <span class="">Task added Get Started with Fast
                                            Cad
                                            project</span>
                                    </div>
                                </a>
                            </li>
                            <li class="py-2 mb-1 border-bottom">
                                <a href="javascript:void(0);" class="d-flex">
                                    <img class="avatar rounded-circle"
                                        src="{{ asset('assets/images/xs/avatar3.jpg') }}"
                                        alt="">
                                    <div class="flex-fill ms-2">
                                        <p class="d-flex justify-content-between mb-0 "><span
                                                class="font-weight-bold">Andrea Gill</span>
                                            <small>1HR</small>
                                        </p>
                                        <span class="">Quality Assurance Task
                                            Completed</span>
                                    </div>
                                </a>
                            </li>
                            <li class="py-2 mb-1 border-bottom">
                                <a href="javascript:void(0);" class="d-flex">
                                    <img class="avatar rounded-circle"
                                        src="{{ asset('assets/images/xs/avatar5.jpg') }}"
                                        alt="">
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
                                        src="{{ asset('assets/images/xs/avatar6.jpg') }}"
                                        alt="">
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
                                        src="{{ asset('assets/images/xs/avatar7.jpg') }}"
                                        alt="">
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
            <p class="mb-0 text-end line-height-sm"><span class="font-weight-bold">{{ auth()->user()->username }}</span></p>
            <small>{{ auth()->user()->role }} Profile</small>
        </div>
        <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
            data-bs-toggle="dropdown" data-bs-display="static">
            <img class="avatar lg rounded-circle img-thumbnail"
                src="{{ asset('assets/images/profile_av.png') }}" alt="profile">
        </a>
        <div
            class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
            <div class="card border-0 w280">
                <div class="card-body pb-0">
                    <div class="d-flex py-1">
                        <img class="avatar rounded-circle"
                            src="{{ asset('assets/images/profile_av.png') }}" alt="profile">
                        <div class="flex-fill ms-3">
                            <p class="mb-0"><span class="font-weight-bold">{{ auth()->user()->username }}</span>
                            </p>
                            <small class="">{{ auth()->user()->email }}</small>
                        </div>
                    </div>

                    <div>
                        <hr class="dropdown-divider border-dark">
                    </div>
                </div>
                <div class="list-group m-2 ">
                    <a href="{{ route('profile.edit', encrypt(auth()->user()->id)) }}" class="list-group-item list-group-item-action border-0 "><i class="icofont-user-alt-7 fs-6 me-3"></i>Profile</a>
                    <a href="" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="list-group-item list-group-item-action border-0 "><i
                                        class="icofont-logout fs-6 me-3"></i>Signout</button>
                            </form>
                        <div>
                    </form>
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
