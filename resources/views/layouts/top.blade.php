<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand ms-4 text-white" href="/">
                Aplikasi SPPT
            </a>
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white " style="padding-top: 24px !important" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mt-md-0 "></ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('template/assets') }}/images/users/1.jpg" alt="user"
                            class="profile-pic me-2" style="text-transform: :uppercase">{{ request()->user()->nama }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
