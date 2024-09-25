<aside class="left-sidebar bg-primary-kai">
    <!-- Sidebar scroll-->
    <div class="brand-logo d-flex align-items-center justify-content-between px-1">
        <a href="{{ route('dashboard.index') }}" class="d-block w-100 text-center">
            <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" height="30" alt="" />
        </a>
        <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-muted"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar px-3" data-simplebar>
        <ul id="sidebarnav">
            <li class="sidebar-item pb-2">
                <a class="sidebar-link bg-primary-dark-kai px-3" href="{{ route('dashboard.index') }}"
                    aria-expanded="false">
                    <i class="ti ti-home"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <!-- ============================= -->
            <!-- Kepegawaian -->
            <!-- ============================= -->
            <li class="nav-small-cap mt-3 mb-1">
                <span class="hide-menu text-white-kai">Kepegawaian</span>
            </li>

            <!-- Time Management -->
            @include('layouts.section.section-sidebar.time-management')
            <!-- End Time Management -->

            <!-- Time Asesmen Pekerja -->
            @include('layouts.section.section-sidebar.asesmen-pekerja')
            <!-- End Asesmen Pekerja -->

            <!-- ============================= -->
            <!-- Kedinasan -->
            <!-- ============================= -->
            {{-- <li class="nav-small-cap mt-3 mb-1">
                    <span class="hide-menu text-white-kai">Kedinasan</span>
                </li> --}}

            <!-- ============================= -->
            <!-- Tunjangan -->
            <!-- ============================= -->
            {{-- <li class="nav-small-cap mt-3 mb-1">
                    <span class="hide-menu text-white-kai">Tunjangan</span>
                </li> --}}

            <!-- ============================= -->
            <!-- Safety Railways Information -->
            <!-- ============================= -->
            {{-- <li class="nav-small-cap mt-3 mb-1">
                    <span class="hide-menu text-white-kai">Safety Railways Information</span>
                </li> --}}

            <!-- ============================= -->
            <!-- Setting -->
            <!-- ============================= -->
            {{-- <li class="nav-small-cap mt-3 mb-1">
                    <span class="hide-menu text-white-kai">Setting</span>
                </li> --}}
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
    <!-- End Sidebar scroll-->
</aside>
