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
                    <a href="{{ route('list/users') }}" {{set_active(['list/users'])}}><i class="fas fa-shield-alt"></i> <span>Users</span></a>
                </li>
                {{-- <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span>User Management</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Users</a></li>
                    </ul>
                </li> --}}
                @endif

                <li>
                    <a href="{{ route('settings') }}" {{set_active(['settings'])}}><i class="fas fa-graduation-cap"></i> <span>Students</span></a>
                </li>
                
                <li>
                    <a href="{{ route('teachers') }}" {{set_active(['teachers'])}}><i class="fas fa-chalkboard-teacher"></i> <span>Teachers</span></a>
                </li>
                
                {{-- <li class="submenu {{set_active(['department/add/page','department/edit/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Departments</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('department/list/page') }}" class="{{set_active(['department/list/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">Department List</a></li>
                        <li><a href="{{ route('department/add/page') }}" class="{{set_active(['department/add/page'])}}">Department Add</a></li>
                        <li><a>Department Edit</a></li>
                    </ul>
                </li>

                <li class="submenu {{set_active(['subject/list/page','subject/add/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Subjects</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}" href="{{ route('subject/list/page') }}">Subject List</a></li>
                        <li><a class="{{set_active(['subject/add/page'])}}" href="{{ route('subject/add/page') }}">Subject Add</a></li>
                        <li><a>Subject Edit</a></li>
                    </ul>
                </li>

                <li class="submenu {{set_active(['invoice/list/page','invoice/paid/page',
                    'invoice/overdue/page','invoice/draft/page','invoice/recurring/page',
                    'invoice/cancelled/page','invoice/grid/page','invoice/add/page',
                    'invoice/view/page','invoice/settings/page',
                    'invoice/settings/tax/page','invoice/settings/bank/page'])}}" {{ request()->is('invoice/edit/*') ? 'active' : '' }}>
                    <a href="#"><i class="fas fa-clipboard"></i>
                        <span> Invoices</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['invoice/list/page','invoice/paid/page','invoice/overdue/page','invoice/draft/page','invoice/recurring/page','invoice/cancelled/page'])}}" href="{{ route('invoice/list/page') }}">Invoices List</a></li>
                        <li><a class="{{set_active(['invoice/grid/page'])}}" href="{{ route('invoice/grid/page') }}">Invoices Grid</a></li>
                        <li><a class="{{set_active(['invoice/add/page'])}}" href="{{ route('invoice/add/page') }}">Add Invoices</a></li>
                        <li><a class="{{ request()->is('invoice/edit/*') ? 'active' : '' }}" href="">Edit Invoices</a></li>
                        <li> <a class="{{ request()->is('invoice/view/*') ? 'active' : '' }}" href="">Invoices Details</a></li>
                        <li><a class="{{set_active(['invoice/settings/page','invoice/settings/tax/page','invoice/settings/bank/page'])}}" href="{{ route('invoice/settings/page') }}">Invoices Settings</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="menu-title">
                    <span>Management</span>
                </li> --}}

                {{-- <li class="submenu {{set_active(['collections','add/fees/collection/page'])}}">
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i>
                        <span> Accounts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['collections'])}}" href="{{ route('collections') }}">Fees Collection</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="salary.html">Salary</a></li>
                        <li><a class="{{set_active(['add/fees/collection/page'])}}" href="{{ route('add/fees/collection/page') }}">Add Fees</a></li>
                        <li><a href="add-expenses.html">Add Expenses</a></li>
                        <li><a href="add-salary.html">Add Salary</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li> --}}
                <li>
                    <a href="{{ route('collections') }}" {{set_active(['add/fees/collection/page'])}}><i class="fas fa-comment-dollar"></i> <span>Student Fee</span></a>
                </li>
                <li>
                    <a href="{{ route('collections') }}" {{set_active(['add/fees/collection/page'])}}><i class="fas fa-comment-dollar"></i> <span>Daily Collection</span></a>
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












