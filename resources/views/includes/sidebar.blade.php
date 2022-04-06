<div class="sidebar-menu">
    <div class="sidebar-header">
{{--        <div class="logo">--}}
{{--            <a href="index.html"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>--}}
{{--        </div>--}}
        <!-- <h3 class="text-white text-center">Attendance Management</h3> -->
        <h3 class="text-white text-center">AMS</h3>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Route::is('dashboard.admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.classrooms') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="{{ Route::is('admin.classrooms') || Route::is('classrooms.create') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Classrooms</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.classrooms') ? 'active' : '' }}"><a href="{{ route('admin.classrooms') }}">Classrooms<span class="badge badge-light">4</span></a></li>
                            <li class="{{ Route::is('classrooms.create') ? 'active' : '' }}"><a href="{{ route('classrooms.create') }}">Create Classrooms</a></li>
                        </ul>
                    </li>
                    @can("Admin.Reports")
                    <li class="{{ Route::is('reports.daily') ||
                                  Route::is('reports.monthly') ||
                                  Route::is('reports.yearly') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                                Reports
                            </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('reports.daily') ? 'active' : '' }}"><a href="{{ route('reports.daily') }}">Daily</a></li>
                            <li class="{{ Route::is('reports.monthly') ? 'active' : '' }}"><a href="{{ route('reports.monthly') }}">Monthly</a></li>
{{--                            <li class="{{ Route::is('reports.yearly') ? 'active' : '' }}"><a href="{{ route('reports.yearly') }}">Yearly</a></li>--}}
                        </ul>
                    </li>
                    @endcan
                    @can("Admin.RFID")
                    <li class="{{ Route::is('rfid.logs') ? 'active' : '' }}">
                        <a href="{{ route('rfid.logs') }}"><i class="ti-layout-sidebar-left"></i>
                            <span>
                                RFID Logs(in/out)
                            </span></a>
                    </li>
                    @endcan
                    @can("Admin.Leave Approval")
                    <li class="{{ Route::is('leave.requests') ||
                                  Route::is('leave.approves') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                              Leave Approval
                            </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('leave.requests') ? 'active' : '' }}"><a href="{{ route('leave.requests') }}">Requests <span class="badge badge-light">4</span></a></li>
                            <li class="{{ Route::is('leave.approves') ? 'active' : '' }}"><a href="{{ route('leave.approves') }}">All Approves <span class="badge badge-light">4</span></a></li>
                        </ul>
                    </li>
                    @endcan
                    @can("Admin.Users")
{{--                    <li class="{{ Route::is('guardians.list') ||--}}
{{--                                  Route::is('students.list') ? 'active' : '' }}">--}}
{{--                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>--}}
{{--                            <span>--}}
{{--                              Non-Admin Users--}}
{{--                            </span></a>--}}
{{--                        <ul class="collapse">--}}
{{--                            <li class="{{ Route::is('students.list') ? 'active' : '' }}"><a href="{{ route('students.list') }}">Student List <span class="badge badge-light">4</span></a></li>--}}
{{--                            <li class="{{ Route::is('guardians.list') ? 'active' : '' }}"><a href="{{ route('guardians.list') }}">Guardian List <span class="badge badge-light">4</span></a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    @endcan
                    @can("Admin.Roles and Permission")
                    <li class="{{ Route::is('roles.index') ||
                                  Route::is('permissions.index') ||
                                  Route::is('roles.create') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                              Roles & Permissions
                            </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('roles.create') ? 'active' : '' }}"><a href="{{ route('roles.create') }}">Create Role<span class="badge badge-light">4</span></a></li>
                            <li class="{{ Route::is('roles.index') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">All Roles <span class="badge badge-light">4</span></a></li>
                            <li class="{{ Route::is('permissions.index') ? 'active' : '' }}"><a href="{{ route('permissions.index') }}">All Permissions <span class="badge badge-light">4</span></a></li>
                        </ul>
                    </li>
                    @endcan
                    @can("Admin.Users")
                    <li class="{{ Route::is('users.*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>
                              Users
                            </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('users.create') ? 'active' : '' }}"><a href="{{ route('users.create') }}">Create User<span class="badge badge-light">4</span></a></li>
                            <li class="{{ Route::is('users.index') ? 'active' : '' }}"><a href="{{ route('users.index') }}">All Users <span class="badge badge-light">4</span></a></li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </div>
</div>
