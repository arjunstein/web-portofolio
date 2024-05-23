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
        <a class="nav-link collapsed" href="{{ route('backend.experience') }}">
            <i class="bx bxl-react"></i>
            <span>Experiences</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('backend.project') }}">
            <i class="bx bxl-react"></i>
            <span>Project</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('backend.education') }}">
            <i class="bx bxl-react"></i>
            <span>Certificates</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bx bxl-react"></i>
            <span>Posting</span>
        </a>
    </li>
</ul>
