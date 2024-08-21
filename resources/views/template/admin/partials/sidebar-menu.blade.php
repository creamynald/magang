<div id="sidebar-menu">
    <ul class="sidebar-links" id="simple-bar">
        <li class="back-btn">
            <a href="{{ route('dashboard') }}">
                <img class="img-fluid" src="{{ asset('admin/assets') }}/images/logo/logo-icon.png" alt="Logo">
            </a>
            <div class="mobile-back text-end">
                <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
            </div>
        </li>

        <!-- General Title -->
        <li class="sidebar-main-title">
            <div>
                <h6>General</h6>
            </div>
        </li>
        

        <!-- Dashboard Menu -->
        <li class="sidebar-list">
            <i class="fa fa-thumb-tack"></i>
            <a class="sidebar-link sidebar-title" href="{{ route('dashboard') }}">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Magang Menu -->
        <li class="sidebar-list">
            <i class="fa fa-thumb-tack"></i>
            <a class="sidebar-link sidebar-title" href="#">
                <i class="fa fa-users"></i>
                <span>Magang</span>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="#">Data Kegiatan</a></li>
                <li><a href="#">Peserta</a></li>
                <li><a href="#">Pembimbing</a></li>
                <li><a href="#">Rincian Kegiatan</a></li>
            </ul>
        </li>

        <!-- Settings Title -->
        <li class="sidebar-main-title">
            <div>
                <h6>Settings</h6>
            </div>
        </li>

        <!-- Users Settings Menu -->
        <li class="sidebar-list">
            <i class="fa fa-thumb-tack"></i>
            <a class="sidebar-link sidebar-title" href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="user-profile.html">Users Profile</a></li>
                <li><a href="edit-profile.html">Users Edit</a></li>
            </ul>
        </li>

        <!-- Applications Settings Menu -->
        <li class="sidebar-list">
            <i class="fa fa-thumb-tack"></i>
            <a class="sidebar-link sidebar-title" href="#">
                <i class="fa fa-cogs"></i>
                <span>Applications</span>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('instansi.index') }}">Instansi</a></li>
                <li><a href="#">App Settings</a></li>
                <li><a href="#">App Management</a></li>
            </ul>
        </li>


    </ul>
</div>
