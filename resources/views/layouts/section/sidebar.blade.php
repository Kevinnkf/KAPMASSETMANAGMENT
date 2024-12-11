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
            {{-- <li class="nav-small-cap mt-3 mb-1">
                <span class="hide-menu text-white-kai">Kepegawaian</span>
            </li> --}}

            <!-- Time Management -->
            {{-- <li class="sidebar-item pb-2">
                <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                    <i class="ti ti-settings"></i>
                    <span class="hide-menu">Time Management</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('cuti.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Cuti</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('time-management.izin.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Izin</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('time-management.dinas.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Dinas</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <!-- End Time Management -->

            <!-- ============================= -->
            <!-- Asset Management System -->
            <!-- ============================= -->
            <li class="nav-small-cap mt-3 mb-1">
                <span class="hide-menu text-white-kai">Asset Management</span>
            </li>

            <!-- Asset Management System -->
            {{-- <li class="sidebar-item pb-2">
                <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                    <i class="ti ti-settings"></i>
                    <span class="hide-menu">Configuration</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('configuration.menus.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Menu</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="sidebar-item pb-2">
                <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                    <i class="ti ti-settings"></i>
                    <span class="hide-menu">Master</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('master.type.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Master Index</span>
                        </a>
                    </li>
                    @foreach ($sidebarData as $masters)
                    @if($masters['condition'] == 'FIELD')
                        @php
                            // Assign the description value
                            $description = $masters['description'];
                        @endphp                                  
                            <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                                <i class="ti ti-settings"></i>
                                <span class="hide-menu">{{$masters['description']}}</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                @foreach($sidebarData as $innerMasters)
                                    @if($innerMasters['condition'] == 'FIELD_VALUE' && $innerMasters['typegcm'] == $description)
                                        @php
                                            // Assign the description value
                                            $href = url('master/type/show/' . $innerMasters['description']);
                                        @endphp
                                        <li class="sidebar-item">
                                            <a href="{{$href}}" class="sidebar-link bg-primary-dark-kai">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">
                                                    {{ $innerMasters['description'] }}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                    @endif
                    @endforeach
                </ul>
            </li>

            <li class="sidebar-item pb-2">
                <a class="sidebar-link bg-primary-dark-kai px-3 has-arrow" href="#" aria-expanded="false">
                    <i class="ti ti-settings"></i>
                    <span class="hide-menu">Transaction</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('transaction.asset.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Index Asset</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('transaction.asset.create') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Add Asset</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('transaction.assign.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Assign</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('transaction.loan.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Loan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('transaction.maintenance.index') }}" class="sidebar-link bg-primary-dark-kai">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Maintenance</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Asset Management System -->

            <!-- Time Asesmen Pekerja -->
            {{-- @include('layouts.section.section-sidebar.asesmen-pekerja') --}}
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
