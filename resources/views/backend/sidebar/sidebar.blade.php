<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @if (auth()->user()->role_name == 'Admin')
                    <li>
                        <a href="{{ route('dashboard') }}" {{set_active(['dashboard'])}}><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{ route('user.show', auth()->user()->id) }}" {{set_active(['user.show'])}}><i class="fas fa-user"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" {{set_active(['users'])}}><i class="fas fa-shield-alt"></i> <span>Users</span></a>
                    </li>
                    <li>
                        <a href="{{ route('student.index') }}" {{set_active(['student.index'])}}><i class="fas fa-graduation-cap"></i> <span>Students</span></a>
                    </li>
                    <li>
                        <a href="{{ route('teacher.index') }}" {{set_active(['teachers'])}}><i class="fas fa-chalkboard-teacher"></i> <span>Teachers</span></a>
                    </li>
                    <li>
                        <a href="{{ route('member.index') }}" {{set_active(['members'])}}><i class="fas fa-users"></i> <span>Members</span></a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}" {{set_active(['contact.index'])}}><i class="fas fa-envelope"></i> <span>Contacts</span></a>
                    </li>
                    <li>
                        <a href="{{ route('department.index') }}" {{set_active(['department.index'])}}><i class="fas fa-layer-group"></i> <span>Departments</span></a>
                    </li>
                    <li>
                        <a href="{{ route('notice.index') }}" {{set_active(['notice.index'])}}><i class="fas fa-file-alt"></i> <span>Notice Board</span></a>
                    </li>
                    <li>
                        <a href="{{ route('syllabus.index') }}" {{set_active(['syllabus.index'])}}><i class="fas fa-file"></i> <span>Syllabus</span></a>
                    </li>
                    <li>
                        <a href="{{ route('collection.index') }}" {{set_active(['collection.create'])}}><i class="fas fa-receipt"></i> <span>Student Fees</span></a>
                    </li>
                    <li>
                        <a href="{{ route('bank.collection') }}" {{set_active(['bank.collection'])}}><i class="fas fa-file-invoice"></i> <span>Bank Collection</span></a>
                    </li>
                    <li>
                        <a href="{{ route('gallery.index') }}" {{set_active(['gallery.index'])}}><i class="fas fa-image"></i> <span>Gallery</span></a>
                    </li>
                    <li>
                        <a href="{{ route('setting.index') }}" {{set_active(['setting.index'])}}><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" {{set_active(['logout'])}}><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                    </li>
                @endif


                @if (auth()->user()->role_name == 'User')
                    <li>
                        <a href="{{ route('user.show', auth()->user()->id) }}" {{set_active(['user.show'])}}><i class="fas fa-user"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="{{ route('notice.index') }}" {{set_active(['notice.index'])}}><i class="fas fa-file-alt"></i> <span>Notice Board</span></a>
                    </li>
                    <li>
                        <a href="{{ route('syllabus.index') }}" {{set_active(['syllabus.index'])}}><i class="fas fa-file"></i> <span>Syllabus</span></a>
                    </li>
                    <li>
                        <a href="{{ route('collection.index') }}" {{set_active(['collection.create'])}}><i class="fas fa-receipt"></i> <span>Office Collection</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" {{set_active(['logout'])}}><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                    </li>
                @endif
                


                @if (auth()->user()->role_name == 'Accountant')
                    <li>
                        <a href="{{ route('user.show', auth()->user()->id) }}" {{set_active(['user.show'])}}><i class="fas fa-user"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="{{ route('bank.collection') }}" {{set_active(['bank.collection'])}}><i class="fas fa-file-invoice"></i> <span>Bank Collection</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" {{set_active(['logout'])}}><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>












