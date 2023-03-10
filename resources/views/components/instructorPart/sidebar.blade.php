<div data-simplebar class="h-100">
    <div class="user-details">
        <div class="d-flex">
            <div class="me-2">
                <img src="{{ asset('adminassets/images/users/avatar-4.jpg') }}" alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="user-info w-100">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Donald Johnson
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-account-circle text-muted me-2"></i>
                                Profile<div class="ripple-wrapper me-2"></div>
                            </a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-cog text-muted me-2"></i>
                                Settings</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-lock-open-outline text-muted me-2"></i>
                                Lock screen</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item"><i
                                    class="mdi mdi-power text-muted me-2"></i>
                                Logout</a></li>
                    </ul>
                </div>

                <p class="text-white-50 m-0">Administrator</p>
            </div>
        </div>
    </div>


    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Main</li>

            {{-- <li>
                <a href="{{ route('main.index') }}" class="waves-effect">
                    <i class="mdi mdi-home"></i><span class="badge bg-primary float-end">3</span>
                    <span>Main Page</span>
                </a>
            </li>
            <li>
                <a href="{{ route('serves.index') }}" class="waves-effect">
                    <i class="ion ion-md-list"></i><span class="badge bg-primary float-end">3</span>
                    <span>Main Serves</span>
                </a>
            </li>
            <li>
                <a href="{{ route('add_project.index') }}" class="waves-effect">
                    <i class="ion ion-md-outlet"></i><span class="badge bg-primary float-end">3</span>
                    <span>Project</span>
                </a>
            </li>
            <li>
                <a href="{{ route('data_companies.index') }}" class="waves-effect">
                    <i class="ion ion-md-paper"></i><span class="badge bg-primary float-end">3</span>
                    <span>Data Companies</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dest_projects.index') }}" class="waves-effect">
                    <i class="ion ion-md-radio-button-on"></i><span class="badge bg-primary float-end">3</span>
                    <span>Dest Projects</span>
                </a>
            </li>
            <li>
                <a href="{{ route('platform_data.index') }}" class="waves-effect">
                    <i class="ion ion-md-quote"></i><span class="badge bg-primary float-end">3</span>
                    <span>Platform Data</span>
                </a>
            </li> --}}

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-email"></i>
                    <span>Courses</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('Course.index')}}">Courses</a></li>
                    <li><a href="{{route('Course.create')}}">Add New Course</a></li>
                </ul>
            </li>


        </ul>
    </div>
    <!-- Sidebar -->
</div>
