<header class="header">
    <nav class="navbar navbar-expand-lg py-0">
        <div class="container-fluid padding-content">
            <a class="navbar-brand" href="{{ route('landing-page.index') }}">
                <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" alt="img-fluid" height="40">
            </a>
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto"style="color: #818181l">
                    <li class="nav-item dropdown-hover d-none d-lg-block">
                        <a class="nav-link text-muted fs-3" href="{{ route('landing-page.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown-hover d-none d-lg-block">
                        <a class="nav-link text-muted fs-3" href="#">Pelayanan Kesehatan</a>
                    </li>
                    <li class="nav-item dropdown-hover d-none d-lg-block">
                        <a class="nav-link text-muted fs-3" href="#">Info KAI</a>
                    </li>
                    <li class="nav-item dropdown-hover d-none d-lg-block">
                        <a class="nav-link text-muted fs-3" href="#">Kontak / Lapor</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2" href="{{ route('login') }}">
                            Masuk
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
