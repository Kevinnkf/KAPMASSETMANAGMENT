<li class="sidebar-item pb-2">
    <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
        <i class="ti ti-settings"></i>
        <span class="hide-menu">Asesmen Pekerja</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            @php
                $redirect_multirater =
                    env('REDIRECT_MULTIRATER360', 'https://multirater360.kai.id/validate?token=') . session('token');
            @endphp
            <a href="{{ $redirect_multirater }}" class="sidebar-link bg-primary-dark-kai">
                <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Asesmen Multirater 360</span>
            </a>
        </li>
        {{-- <li class="sidebar-item">
            <a href="#" class="sidebar-link bg-primary-dark-kai">
                <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Asesmen Kepribadian</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link bg-primary-dark-kai">
                <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Asesmen Kompetensi Utama dan
                    Peran</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link bg-primary-dark-kai">
                <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Admin Asesmen Pekerja</span>
            </a>
        </li> --}}
    </ul>
</li>