@extends('layouts.app')

@section('styles')

    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />

    <style>
        .esa-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .esa-header-dark {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 28px;
            line-height: 32px;
            letter-spacing: -0.019em;
            text-align: left;
            color: #202020;
        }

        .esa-subheader-dark-grey {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -0.011em;
            text-align: left;
            padding-top: 1rem;
            color: #818181;
        }
    </style>

    <style>
        .esa-card-container {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            border-radius: 0.5rem;
        }

        .esa-card {
            background-color: #F2F8FF;
            padding: 1rem;
            border-radius: 0.5rem;
            width: 33%;
            /* box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1); */
        }

        .esa-card h3 {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -0.011em;
            text-align: left;
            color: #202020;
            margin: 0;
        }

        .esa-card h2 {
            font-family: 'Open Sans', sans-serif;
            font-size: 18px;
            font-weight: 600;
            line-height: 20px;
            letter-spacing: -0.014em;
            text-align: left;
            color: #0B56A7;
            margin: 12px 0;
        }

        .esa-card-content {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem 0rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.625rem;
        }

        .esa-card-content-box {
            width:33.3%;
            display: flex;
            justify-content: center; /* Horizontally centers the content */
            align-items: center;     /* Vertically centers the content */
        }

        .esa-card-content div {
            text-align: center;
        }

        .esa-card-content div p {
            margin: 5px 0;
        }

        .esa-card-value {
            font-family: 'Open Sans', sans-serif;
            font-size: 24px;
            font-weight: 600;
            line-height: 28px;
            letter-spacing: -0.019em;
            padding: 0.5rem;
        }

        .esa-card-sub-value {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            letter-spacing: -0.006em;
            color: #202020;
        }

        .esa-sisa-cuti-primary {
            color: #0b56a7;
        }

        .esa-sisa-cuti-danger {
            color: #E6251C;
        }

        .esa-divider {
            width: 0.125rem;
            background-color: #ddd;
            height: 4rem;
        }
    </style>

    <style>
        .esa-filter-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 16px;
        }
    </style>

    <style>
        .esa-table-light {
            --bs-table-color: #202020;
            --bs-table-bg: #F2F8FF;
            --bs-table-border-color: #dde0e3;
            --bs-table-striped-bg: #eaedef;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #dde0e3;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #e4e6e9;
            --bs-table-hover-color: #000;
            color: var(--bs-table-color);
            border-color: var(--bs-table-border-color);
        }
        table.dataTable {
            border: 1px solid transparent;
            border-radius: 16px;
        }
        table.dataTable thead {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -0.011em;
            color: #202020;
        }
        table.dataTable thead th {
            background-color: #F7F7F7;
        }
        table.dataTable tbody {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -0.011em;
            color: #202020;
        }
        .table > :not(caption) > * > * {
            padding: 16px 16px;
            color: var(--bs-table-color-state, var(--bs-table-color-type, var(--bs-table-color)));
            background-color: var(--bs-table-bg);
            border-bottom-width: var(--bs-border-width);
            box-shadow: inset 0 0 0 9999px rgba(0,0,0,0) !important;
        }
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            background-color: white;
        }
        .table-responsive .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #FFFFFF;
            padding: 6px 12px;
            border-radius: 8px;
            border: 1px solid #0B56A7;
        }
        .table-responsive .dataTables_wrapper .dataTables_paginate .paginate_button .previous {
            border-radius: 7px 0 0 7px;
            background-color: #EAEFF4;
            border: 1px solid #0B56A7;
        }

        .table-responsive .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #0B56A7;
            background-color: #F7F7F7;
            border-color: transparent;
        }
    </style>

    <style>
        .esa-btn-lg {
            font-weight: 600;
            font-size: 14px;
            line-height: 16px;
            letter-spacing: -0.006em;
            height: 40px;
        }
        .esa-btn {
            font-weight: 600;
            font-size: 12px;
            line-height: 16px;
            height: 36px;
        }
        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: #0b56a7;
            --bs-btn-border-color: #0b56a7;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #3472B6;
            --bs-btn-hover-border-color: #3472B6;
            --bs-btn-focus-shadow-rgb: 117, 153, 255;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #09488b;
            --bs-btn-active-border-color: #09488b;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #E3E3E3;
            --bs-btn-disabled-border-color: #E3E3E3;
        }
        .btn-outline-primary {
            --bs-btn-color: #0B56A7;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #0B56A7;
            --bs-btn-hover-color: #202020;
            --bs-btn-hover-bg: #ffffff;
            --bs-btn-hover-border-color: #0B56A7;
            --bs-btn-focus-shadow-rgb: 93, 135, 255;
            --bs-btn-active-color: #202020;
            --bs-btn-active-bg: #f7f7f7;
            --bs-btn-active-border-color: #0B56A7;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #0B56A7;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #0B56A7;
            --bs-gradient: none;
        }
        .btn-outline-danger {
            --bs-btn-color: #E6251C;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #E6251C;
            --bs-btn-hover-color: #202020;
            --bs-btn-hover-bg: #ffffff;
            --bs-btn-hover-border-color: #E6251C;
            --bs-btn-focus-shadow-rgb: 250, 137, 107;
            --bs-btn-active-color: #202020;
            --bs-btn-active-bg: #F7F7F7;
            --bs-btn-active-border-color: #E6251C;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #E6251C;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #E6251C;
            --bs-gradient: none;
        }
        .btn-outline-muted {
            --bs-btn-color: #202020;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #C8C8C8;
            --bs-btn-hover-color: #202020;
            --bs-btn-hover-bg: #ffffff;
            --bs-btn-hover-border-color: #C8C8C8;
            --bs-btn-focus-shadow-rgb: 93, 135, 255;
            --bs-btn-active-color: #202020;
            --bs-btn-active-bg: #f7f7f7;
            --bs-btn-active-border-color: #C8C8C8;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #C8C8C8;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #C8C8C8;
            --bs-gradient: none;
        }
    </style>

    <style>
        .grey-neutral {
            /* --bs-text-opacity: 1;
            color: rgba(#202020, var(--bs-text-opacity)) !important; */
            color: #202020;
        }
        .green-success {
            /* --bs-text-opacity: 1;
            color: rgba(#379438, var(--bs-text-opacity)) !important; */
            color: #379438;
        }
        .red-error {
            /* --bs-text-opacity: 1;
            color: rgba(#C01F17, var(--bs-text-opacity)) !important; */
            color: #C01F17;
        }

        .bg-grey-neutral {
            height: 32px;
            padding: 8px, 16px, 8px, 16px;
            /* --bs-bg-opacity: 1;
            background-color: rgba(#E3E3E3, var(--bs-bg-opacity)) !important; */
            background-color: #E3E3E3;
        }
        .bg-green-success {
            height: 32px;
            padding: 8px, 16px, 8px, 16px;
            /* --bs-bg-opacity: 1;
            background-color: rgba(#D9F0D9, var(--bs-bg-opacity)) !important; */
            background-color: #D9F0D9;
        }
        .bg-red-error {
            height: 32px;
            padding: 8px, 16px, 8px, 16px;
            /* --bs-bg-opacity: 1;
            background-color: rgba(#FAD3D2, var(--bs-bg-opacity)) !important; */
            background-color: #FAD3D2;
        }
    </style>

    <style>
        .form-select {
            color: #202020;
            --bs-form-select-bg-img: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%230b56a7' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        @media (max-width: 1024px) {
        }

        @media (max-width: 860px) {
            .esa-card {
                margin-bottom: 1rem;
                width: 100%;
            }
            .esa-card h3 {
                font-size: 14px;
            }
            .esa-card h2 {
                font-size: 16px;
            }
            .esa-card-value {
                font-size: 18px;
                padding: 0.125rem;
            }
            .esa-card-sub-value {
                font-size: 11px;
            }
            .esa-divider {
                height: 3.5rem;
            }
        }

        @media (max-width: 415px) {
            .esa-header {
                display: block;
                justify-content: space-between;
            }
            .esa-header-dark {
                font-size: 24px;
            }
            .esa-subheader-dark-grey {
                font-size: 14px;
            }

            .esa-card-container {
                display: block;
            }
            .esa-card {
                margin-bottom: 1rem;
                width: 100%;
            }
            .esa-card h3 {
                font-size: 14px;
            }
            .esa-card h2 {
                font-size: 16px;
            }
            .esa-card-value {
                font-size: 22px;
            }
            .esa-card-sub-value {
                font-size: 12px;
            }
            .esa-divider {
                height: 3.5rem;
            }
        }
    </style>

@endsection

@section('content')

    <?php
    // Sesuaikan timezone dengan lokasi
    date_default_timezone_set('Asia/Jakarta');
    ?>

    {{-- Breadcrumb --}}
    @include('kepegawaian.time-management.cuti.breadcrumb')
    {{-- End Breadcrumb --}}

    <!-- Header -->
    <div class="py-3">
        <div class="esa-header">
            <div>
                <div class="esa-header-dark">Halaman Cuti</div>
                <p class="esa-subheader-dark-grey pull-left">Berikut ini adalah daftar riwayat pengajuan cuti Anda.</p>
            </div>
            <button class="btn btn-primary esa-btn-lg pull-right" onclick="window.location='{{ url('/kepegawaian/time-management/cuti/create') }}'"><span><i class="ti ti-plus fs-4 me-2"></i> Form Pengajuan Cuti</span></button>
        </div>
    </div>

    <!-- Jenis Cuti -->
    <div class="esa-card-container">
        <div class="esa-card">
            <h3>Jenis cuti</h3>
            <h2>Cuti Tahunan</h2>
            <div class="esa-card-content">
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-primary">15</div>
                        <p class="esa-card-sub-value">Sisa Cuti</p>
                    </div>
                </div>
                <div class="esa-divider"></div>
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-primary">20</div>
                        <p class="esa-card-sub-value">Kuota Cuti</p>
                    </div>
                </div>
                <div class="esa-divider"></div>
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-danger">5</div>
                        <p class="esa-card-sub-value">Terpakai</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="esa-card">
            <h3>Jenis cuti</h3>
            <h2>Cuti Despensasi</h2>
            <div class="esa-card-content">
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-primary">15</div>
                        <p class="esa-card-sub-value">Sisa Cuti</p>
                    </div>
                </div>
                <div class="esa-divider"></div>
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-primary">20</div>
                        <p class="esa-card-sub-value">Kuota Cuti</p>
                    </div>
                </div>
                <div class="esa-divider"></div>
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-danger">5</div>
                        <p class="esa-card-sub-value">Terpakai</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="esa-card">
            <h3>Jenis cuti</h3>
            <h2>Cuti Besar</h2>
            <div class="esa-card-content">
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-primary">15</div>
                        <p class="esa-card-sub-value">Sisa Cuti</p>
                    </div>
                </div>
                <div class="esa-divider"></div>
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-primary">20</div>
                        <p class="esa-card-sub-value">Kuota Cuti</p>
                    </div>
                </div>
                <div class="esa-divider"></div>
                <div class="esa-card-content-box">
                    <div>
                        <div class="esa-card-value esa-sisa-cuti-danger">5</div>
                        <p class="esa-card-sub-value">Terpakai</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Table -->
    <div class="py-4">
        <div class="esa-filter-container">
            <div>
                <select class="form-select" style="width: 9.5rem; stroke: red;" id="year-select">
                    <option value="2022">Tahun 2022</option>
                    <option value="2021">Tahun 2021</option>
                    <option value="2020">Tahun 2020</option>
                </select>
            </div>
            <button class="btn btn-outline-primary esa-btn-lg">Clear Filter</button>
        </div>
    </div>

    <!-- Table -->
    <div class="card-datatable table-responsive">
        <table id="table-cuti" class="table table-striped display nowrap esa-table-light">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tipe Cuti</th>
                    <th class="text-center">Tanggal Mulai</th>
                    <th class="text-center">Tanggal Berakhir</th>
                    <th class="text-center">Jumlah Hari</th>
                    <th>Nama Atasan</th>
                    <th>NIPP Atasan</th>
                    <th class="text-center">Status Atasan</th>
                    <th class="text-center">Status SDM</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Table data will be dynamically inserted here -->
            </tbody>
        </table>
    </div>



    <script>
        // Sample data for the table
        const cutiData = [
            { no: 1, tipe: 'Cuti Tahunan', mulai: '24 November 2022', berakhir: '24 November 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Menunggu', sdm: 'Menunggu' },
            { no: 2, tipe: 'Cuti Tahunan', mulai: '27 November 2022', berakhir: '27 November 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Ditolak', sdm: 'Ditolak' },
            { no: 3, tipe: 'Cuti Tahunan', mulai: '1 Desember 2022', berakhir: '1 Desember 2022', jumlah_hari: '2', nama_atasan: 'Haris Rizki', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 4, tipe: 'Cuti Tahunan', mulai: '13 Desember 2022', berakhir: '13 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 5, tipe: 'Cuti Tahunan', mulai: '20 Desember 2022', berakhir: '20 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 6, tipe: 'Cuti Tahunan', mulai: '24 November 2022', berakhir: '24 November 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Menunggu', sdm: 'Menunggu' },
            { no: 7, tipe: 'Cuti Tahunan', mulai: '27 November 2022', berakhir: '27 November 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Ditolak', sdm: 'Ditolak' },
            { no: 8, tipe: 'Cuti Tahunan', mulai: '1 Desember 2022', berakhir: '1 Desember 2022', jumlah_hari: '2', nama_atasan: 'Haris Rizki', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 9, tipe: 'Cuti Tahunan', mulai: '13 Desember 2022', berakhir: '13 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 10, tipe: 'Cuti Tahunan', mulai: '20 Desember 2022', berakhir: '20 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 11, tipe: 'Cuti Tahunan', mulai: '20 Desember 2022', berakhir: '20 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 12, tipe: 'Cuti Tahunan', mulai: '24 November 2022', berakhir: '24 November 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Menunggu', sdm: 'Menunggu' },
            { no: 13, tipe: 'Cuti Tahunan', mulai: '27 November 2022', berakhir: '27 November 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Ditolak', sdm: 'Ditolak' },
            { no: 14, tipe: 'Cuti Tahunan', mulai: '1 Desember 2022', berakhir: '1 Desember 2022', jumlah_hari: '2', nama_atasan: 'Haris Rizki', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 15, tipe: 'Cuti Tahunan', mulai: '13 Desember 2022', berakhir: '13 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            { no: 16, tipe: 'Cuti Tahunan', mulai: '20 Desember 2022', berakhir: '20 Desember 2022', jumlah_hari: '2', nama_atasan: 'Luki Abdurahman', nipp_atasan: '290013320', atasan: 'Disetujui', sdm: 'Disetujui' },
            // Add more data here for testing
        ];

        const rowsPerPage = 3;
        let currentPage = 1;

        // Function to render table rows
        function renderTable(page) {
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Clear existing rows

            // const start = (page - 1) * rowsPerPage;
            // const end = page * rowsPerPage;

            const start = 0;
            const end = cutiData.length;

            cutiData.slice(start, end).forEach(item => {
                const row = `<tr>
                    <td>${item.no}</td>
                    <td>${item.tipe}</td>
                    <td class="text-center">${item.mulai}</td>
                    <td class="text-center">${item.berakhir}</td>
                    <td class="text-center">${item.jumlah_hari}</td>
                    <td>${item.nama_atasan}</td>
                    <td>${item.nipp_atasan}</td>
                    <td class="text-center"><span class="badge rounded-pill font-medium ${item.atasan === 'Ditolak' ? 'bg-light-danger red-error' : item.atasan === 'Disetujui' ? 'bg-light-success green-success' : 'bg-light-primary grey-neutral'}">${item.atasan}</span></td>
                    <td class="text-center"><span class="badge rounded-pill font-medium ${item.atasan === 'Ditolak' ? 'bg-light-danger red-error' : item.atasan === 'Disetujui' ? 'bg-light-success green-success' : 'bg-light-primary grey-neutral'}">${item.sdm}</span></td>
                    <td class="action-buttons">
                        <button class="btn mb-1 waves-effect waves-light btn-outline-danger esa-btn">Batalkan</button>
                        <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="height:36px">Cetak</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        }

        // Function to render pagination
        function renderPagination() {
            // const pagination = document.getElementById('pagination');
            // pagination.innerHTML = ''; // Clear existing pagination buttons

            // const totalPages = Math.ceil(cutiData.length / rowsPerPage);

            // // Previous button
            // if (currentPage > 1) {
            //     pagination.innerHTML += `<li><a href="#" onclick="goToPage(${currentPage - 1})">Previous</a></li>`;
            // }

            // for (let i = 1; i <= totalPages; i++) {
            //     const pageItem = `<li><a href="#" class="${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</a></li>`;
            //     pagination.innerHTML += pageItem;
            // }

            // // Next button
            // if (currentPage < totalPages) {
            //     pagination.innerHTML += `<li><a href="#" onclick="goToPage(${currentPage + 1})">Next</a></li>`;
            // }
        }

        // Function to handle page change
        function goToPage(page) {
            currentPage = page;
            renderTable(page);
            renderPagination();
        }

        // Initial rendering
        renderTable(currentPage);
        renderPagination();
    </script>
@endsection

@section('scripts')
        <script src="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.js') }}"></script>
        <script src="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/landing-page/dist/js/custom.js') }}"></script>
        <script src="{{ asset('assets/dist/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/datatable/datatable-basic.init.js') }}"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#table-cuti').DataTable({
                   "language": {
                        "info": "Showing _START_ to _END_ of _TOTAL_ data",
                        "lengthMenu": "Show _MENU_ data",       // Ubah jika ingin
                        "infoEmpty": "Showing 0 to 0 of 0 data",   // Teks jika tidak ada data
                        "infoFiltered": "(filtered from _MAX_ total data)",
                        "paginate": {
                            "previous": '<i class="ti ti-chevron-left"></i>', // Change 'Previous' to 'Sebelumnya'
                            "next": '<i class="ti ti-chevron-right"></i>'      // Optional: change 'Next' as well
                        }
                    },
                    "info": true, // Menampilkan informasi jumlah data
                    "fixedHeader": true, // Header tetap di atas saat scroll
                    "fixedColumns": {
                        "leftColumns": 0,
                        "rightColumns": 3,
                    }, // Fix 3 column terakhir
                    "paging": true, // Mengaktifkan pagination
                    "pageLength": 5, // Jumlah data per halaman
                    "lengthMenu": [5, 10, 25, 50, 100], // Opsi jumlah data per halaman
                    "lengthChange": false, // Menyembunyikan lengthMenu
                    "searching": false, // Menyembunyikan search box
                    "ordering": false, // Menyembunyikan fitur ordering
                    "scrollY": false, // Scroll Vertical
                    "scrollX": true, // Scroll Horizontal
                    "scrollCollapse": true, // Scroll Collapse
                });
            });
        </script>
@endsection

