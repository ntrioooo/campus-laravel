<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
                </a>
            </li>
        @cannot ('admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/gets*') ? 'active' : '' }}" href="/dashboard/gets">
                <span data-feather="file"></span>
                Ambil Kelas
                </a>
            </li>
        @endcannot

        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="grid"></span>
                Bikin Kelas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/lectures*') ? 'active' : '' }}" href="/dashboard/lectures">
                <span data-feather="file-text"></span>
                Data Dosen
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>