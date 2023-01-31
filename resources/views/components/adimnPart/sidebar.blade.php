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

    @php
        $count=\App\Models\ReqestRnstructor::where('read',"0")->count();

    @endphp


<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Main</li>
        @can('admin.view')
        <li>

            <a  class="has-arrow waves-effect">

                <i class="mdi mdi-email"></i>
                @if($count)
                <span class="badge bg-warning float-end">New</span>
                @endif
                <span>  Admins </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('admin.index')}}">Admins </a> </li>
            </ul>
            <ul class="sub-menu" aria-expanded="false">

                @can('inst.view')

                <li><a href="{{route('getrequstinst')}}">RequstInstructor  <span class="badge bg-primary float-end">{{$count}}</span></a></li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('inst.view')
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Instructor</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('instructor.index')}}">Instructor</a></li>
            </ul>

        </li>
        @endcan
        @can('category.view')
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Categories</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('Category.index')}}">Categories</a></li>
                @can('category.create')
                <li><a href="{{route('Category.create')}}">Add New Category</a></li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('role.view')
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Roles</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('role.index')}}">Roles</a></li>
                @can('role.create')
                <li><a href="{{route('role.create')}}">Add New Role</a></li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('chat.view')
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-email"></i>
                    <span>Chat</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('chat_group')}}">Chat</a></li>
                </ul>
            </li>
        @endcan
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Map</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('map')}}">Chat</a></li>
            </ul>
        </li>
        <li>

    </ul>
</div>
<!-- Sidebar -->
</div>
