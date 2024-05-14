<nav class="navbar navbar-expand-sm">
    <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item nav-item-topbar">
                <a class="nav-link nav-link-topbar" href="{{ route('asesmen-multirater-360-dashboard.index') }}">
                    <span style="margin-right: 4px;">
                        <i class="ti ti-home"></i>
                    </span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item nav-item-topbar dropdown-topbar">
                <a class="nav-link nav-link-topbar">
                    <div class="row">
                        <div class="col-auto">
                            <span style="margin-right: 4px;">
                                <i class="ti ti-settings"></i>
                            </span>
                            General Settings
                        </div>
                        <div class="col-auto">
                            <i class="ti ti-chevron-down"></i>
                        </div>
                    </div>
                </a>

                <div class="dropdown-content-topbar">
                    <a href="{{ route('asesmen-multirater-360-indikator-kompetensi.index') }}">Indikator Kompetensi</a>
                    <a href="#">Skor Rekomendasi</a>
                    <a href="#">Periode Asesmen</a>
                    <a href="#">Posisi & Job Tidak Perlu Dinilai</a>
                    <a href="#">Redaksional Notifikasi</a>
                    <a href="#">Mapping Penilai</a>
                    <a href="#">Penggantian Penilai</a>
                    <a href="#">Reset Penilai</a>
                    <a href="#">Upload SAP</a>
                    <a href="#">Hak Akses</a>
                </div>
            </li>
            <li class="nav-item nav-item-topbar">
                <a class="nav-link nav-link-topbar" href="javascript:void(0)">
                    <span style="margin-right: 4px;">
                        <i class="ti ti-check"></i>
                    </span>
                    Approval Pengajuan
                </a>
            </li>
            <li class="nav-item nav-item-topbar dropdown-topbar">
                <a class="nav-link nav-link-topbar">
                    <div class="row">
                        <div class="col-auto">
                            <span style="margin-right: 4px;">
                                <i class="ti ti-chart-bar"></i>
                            </span>
                            Monitoring
                        </div>
                        <div class="col-auto">
                            <i class="ti ti-chevron-down"></i>
                        </div>
                    </div>
                </a>

                <div class="dropdown-content-topbar">
                    <a href="#">General</a>
                    <a href="#">Daerah</a>
                    <a href="#">Anak Perusahaan</a>
                </div>
            </li>
            <li class="nav-item nav-item-topbar dropdown-topbar">
                <a class="nav-link nav-link-topbar">
                    <div class="row">
                        <div class="col-auto">
                            <span style="margin-right: 4px;">
                                <i class="ti ti-receipt"></i>
                            </span>
                            Reporting
                        </div>
                        <div class="col-auto">
                            <i class="ti ti-chevron-down"></i>
                        </div>
                    </div>
                </a>

                <div class="dropdown-content-topbar">
                    <a href="#">Daftar Skor & Kategori Hasil Asesmen Pegawai</a>
                    <a href="#">Data Dinilai</a>
                    <a href="#">Data Menilai</a>
                    <a href="#">Laporan Kompetensi</a>
                    <a href="#">Nilai Kompetensi</a>
                    <a href="#">Nilai Rata-rata Kompetensi</a>
                    <a href="#">Data Penggantian Penilai/Dinilai</a>
                    <a href="#">Kompetensi Akhlak</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
