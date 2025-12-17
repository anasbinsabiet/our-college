<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" {{set_active(['dashboard'])}}><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>
                @if (auth()->user()->role_name == 'Admin')
                    <li>
                        <a href="{{ route('user.index') }}" {{set_active(['users'])}}><i class="fas fa-shield-alt"></i> <span>Users</span></a>
                    </li>
                    <li>
                        <a href="{{ route('student.index') }}" {{set_active(['student.index'])}}><i class="fas fa-graduation-cap"></i> <span>Students</span></a>
                    </li>
                    <li>
                        <a href="{{ route('teacher.index') }}" {{set_active(['teachers'])}}><i class="fas fa-chalkboard-teacher"></i> <span>Teachers</span></a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('collection.index') }}" {{set_active(['collection.create'])}}><i class="fas fa-receipt"></i> <span>Fees Collection</span></a>
                </li>
                @if (auth()->user()->role_name != 'Accountant')
                    <li>
                        <a href="{{ route('notice.index') }}" {{set_active(['notice.create'])}}><i class="fas fa-file"></i> <span>Notice Board</span></a>
                    </li>
                @endif
                @if (auth()->user()->role_name == 'Admin')
                    <li>
                        <a href="{{ route('contact.index') }}" {{set_active(['contact.index'])}}><i class="fas fa-envelope"></i> <span>Contacts</span></a>
                    </li>
                    <li>
                        <a href="{{ route('setting.index') }}" {{set_active(['setting.index'])}}><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>












