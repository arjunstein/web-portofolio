<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- End Dashboard Nav -->

    <li class="nav-heading">Manage Data</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('backend.about', ['id' => $about]) }}">
            <i class="ri-file-user-fill"></i>
            <span>About</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('backend.skills') }}">
            <i class="bx bxl-react"></i>
            <span>Skills</span>
        </a>
    </li>

    <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('backend.education') }}">
        <i class="bx bxl-react"></i>
        <span>Education</span>
    </a>
</li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="icons-bootstrap.html">
                    <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                </a>
            </li>
            <li>
                <a href="icons-remix.html">
                    <i class="bi bi-circle"></i><span>Remix Icons</span>
                </a>
            </li>
            <li>
                <a href="icons-boxicons.html">
                    <i class="bi bi-circle"></i><span>Boxicons</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Icons Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
            <i class="bi bi-file-earmark"></i>
            <span>Blank</span>
        </a>
    </li>
    <!-- End Blank Page Nav -->
</ul>
