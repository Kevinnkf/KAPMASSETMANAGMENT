<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="bg-primary-kai">
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.index') }}" class="d-block w-100 text-center">
                <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" height="40" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar px-3" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link bg-primary-dark-kai px-3" href="{{ route('dashboard.index') }}"
                        aria-expanded="false">
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
                <li class="sidebar-item">
                    <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                        <span class="hide-menu">Time Management</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Cuti</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Izin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Dinas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Time Management -->

                <!-- Time Assesmen Pekerja -->
                <li class="sidebar-item">
                    <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                        <span class="hide-menu">Assesmen Pekerja</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('assesmen-multirater-360.index') }}"
                                class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Assesmen Multirater 360</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Assesmen Kepribadian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Assesmen Kompetensi Utama dan
                                    Peran</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link bg-primary-dark-kai">
                                <span class="hide-menu" style="padding-left: 16px;">Admin Asesmen Pekerja</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Assesmen Pekerja -->

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
    </div>
    <!-- End Sidebar scroll-->
</aside>
