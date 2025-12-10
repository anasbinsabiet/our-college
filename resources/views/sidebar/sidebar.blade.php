<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                {{-- <li class="submenu {{set_active(['setting'])}}">
                    <a href="{{ route('setting') }}"><i class="fas fa-cog"></i>
                        <span> Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('setting') }}"  class="{{set_active(['setting'])}}">General Settings</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('dashboard') }}" {{set_active(['dashboard'])}}><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>
                

                {{-- <li class="submenu {{set_active(['dashboard','teacher/dashboard','student/dashboard'])}}">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('dashboard') }}" class="{{set_active(['dashboard'])}}">Admin Dashboard</a></li>
                        <li><a href="{{ route('teacher/dashboard') }}" class="{{set_active(['teacher/dashboard'])}}">Teacher Dashboard</a></li>
                        <li><a href="{{ route('student/dashboard') }}" class="{{set_active(['student/dashboard'])}}">Student Dashboard</a></li>
                    </ul>
                </li> --}}
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li>
                    <a href="{{ route('users') }}" {{set_active(['users'])}}><i class="fas fa-shield-alt"></i> <span>Users</span></a>
                </li>
                {{-- <li class="submenu {{set_active(['users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span>User Management</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('users') }}" class="{{set_active(['users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Users</a></li>
                    </ul>
                </li> --}}
                @endif

                <li>
                    <a href="{{ route('student.index') }}" {{set_active(['student.index'])}}><i class="fas fa-graduation-cap"></i> <span>Students</span></a>
                </li>
                
                <li>
                    <a href="{{ route('teacher.index') }}" {{set_active(['teachers'])}}><i class="fas fa-chalkboard-teacher"></i> <span>Teachers</span></a>
                </li>
                <li>
                    <a href="{{ route('collection.index') }}" {{set_active(['collection.create'])}}><i class="fas fa-comment-dollar"></i> <span>Student Fee</span></a>
                </li>
                <li>
                    <a href="{{ route('collection.index') }}" {{set_active(['collection.create'])}}><i class="fas fa-comment-dollar"></i> <span>Daily Collection</span></a>
                </li>
                <li>
                    <a href="{{ route('setting') }}" {{set_active(['setting'])}}><i class="fas fa-cog"></i> <span>Settings</span></a>
                </li>
                {{-- <li>
                    <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                </li>
                <li>
                    <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                </li>
                <li>
                    <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>












