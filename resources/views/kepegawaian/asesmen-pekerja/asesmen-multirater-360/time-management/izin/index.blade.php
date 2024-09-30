@extends('layouts.app')

@section('content')
    <div class="contaner">
        {{-- Breadcrumb --}}
        @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
        {{-- End Breadcrumb --}}
        <div>
            <h4 class="fw-semibold mt-3 text-secondary-kai h2 ">{{ $title }}</h4>
        </div>
        @if ($atasan == 1)
            <div class="row mb-4">
                <div class="col-10 py-2 px-3" style="vertical-align: middle">{{ $subtitle }}</div>
                <div class="col-2 py-2 d-flex justify-content-end">
                    <a href="{{ route('time-management.izin.create') }}"
                        class="btn btn-primary d-flex align-items-center justify-content-center" style="width: 189px;">
                        <i class="ti ti-plus fs-4 me-2"></i>
                        Form Pengajuan Izin
                    </a>
                </div>
            </div>
            <div>
                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-underline w-100" role="tablist">
                            <li class="nav-item col-6 text-center">
                                <a class="nav-link active w-100" data-bs-toggle="tab" href="#navpill-1" role="tab"
                                    style="border-radius: 0;">
                                    <span>Halaman Pribadi</span>
                                </a>
                            </li>
                            <li class="nav-item col-6 text-center">
                                <a class="nav-link w-100" data-bs-toggle="tab" href="#navpill-2" role="tab"
                                    style="border-radius: 0;">
                                    <span>Data Izin Pegawai(2)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content mt-2">
                    <!-- Halaman Pribadi content -->
                    <div class="tab-pane active mb-5" id="navpill-1" role="tabpanel">
                        <!-- Content for Halaman Pribadi -->
                        <div class="row mb-3 mt-3">
                            <div class="col d-flex justify-content-start align-items-center">
                                <select class="form-control form-select me-2" style="width: 150px;">
                                    <option>Status</option>
                                </select>
                                <select class="form-control form-select" style="width: 150px;">
                                    <option>Tahun</option>
                                </select>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center">
                                <a href="{{ route('time-management.izin.cetakIzin') }}"
                                    class="btn mb-1 waves-effect waves-light fw-bolder btn-outline-primary me-2">
                                    Cetak Presensi
                                </a>
                                <button type="button"
                                    class="btn mb-1 waves-effect waves-light fw-bolder btn-outline-primary">
                                    Report Excel
                                </button>
                            </div>
                        </div>
                        <section class="datatables">
                            <!-- basic table -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="izin" class="table border table-striped text-nowrap">
                                                <thead>
                                                    <!-- start row -->
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tipe Izin</th>
                                                        <th>Tanggal Izin</th>
                                                        <th>Jam Izin</th>
                                                        <th>Jumlah Jam</th>
                                                        <th>Nama Atasan</th>
                                                        <th>NIPP Atasan</th>
                                                        <th>Telepon</th>
                                                        <th>Alasan</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                    <!-- end row -->
                                                </thead>
                                                <tbody>
                                                    <!-- start row -->
                                                    <tr>
                                                        <td>Tiger Nixon</td>
                                                        <td>System Architect</td>
                                                        <td>Edinburgh</td>
                                                        <td>61</td>
                                                        <td>2011/04/25</td>
                                                        <td>$320,800</td>
                                                        <td>Tiger Nixon</td>
                                                        <td>System Architect</td>
                                                        <td>Edinburgh</td>
                                                        <td>
                                                            <span
                                                                class="mb-1 badge rounded-pill bg-opacity-25 bg-success fw-bold text-success"><b>Disetujui</b></span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#" class="fw-bolder" data-bs-toggle="modal"
                                                                data-bs-target="#bs-example-modal-md">Lihat
                                                                Detail</a>
                                                        </td>
                                                    </tr>
                                                    <!-- end row -->
                                                    <!-- start row -->
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>63</td>
                                                        <td>2011/07/25</td>
                                                        <td>$170,750</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>63</td>
                                                        <td>
                                                            <span
                                                                class="mb-1 badge rounded-pill font-medium bg-dark bg-opacity-25 text-dark"><b>Menunggu</b>
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="" class="fw-bolder">Lihat Detail</a>
                                                        </td>
                                                    </tr>
                                                    <!-- end row -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Data Pegawai content with sub-tabs -->
                    <div class="tab-pane" id="navpill-2" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <!-- Inner Tab for Data Pegawai -->
                                <ul class="nav nav-pills2 w-100 mb-3 p-2" role="tablist" style="background: #F2F8FF">
                                    <li class="nav-item col-6 text-center">
                                        <a class="nav-link active w-100" data-bs-toggle="tab" href="#innerpill-1"
                                            role="tab">
                                            <span>Pengajuan</span>
                                            <span class="badge-rounded ms-auto">1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item col-6 text-center">
                                        <a class="nav-link w-100" data-bs-toggle="tab" href="#innerpill-2" role="tab">
                                            <span>Approval</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="innerpill-1" role="tabpanel">
                                        <section class="datatables">
                                            <!-- basic table -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="pengajuan"
                                                                class="table border table-striped text-nowrap">
                                                                <thead>
                                                                    <!-- start row -->
                                                                    <tr>
                                                                        <th>Nipp</th>
                                                                        <th>Nama Izin</th>
                                                                        <th>Posisi</th>
                                                                        <th>Tanggal</th>
                                                                        <th>Nama Atasan</th>
                                                                        <th class="text-center">Aksi</th>
                                                                    </tr>
                                                                    <!-- end row -->
                                                                </thead>
                                                                <tbody>
                                                                    <!-- start row -->
                                                                    <tr>
                                                                        <td>Tiger Nixon</td>
                                                                        <td>System Architect</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>61</td>
                                                                        <td>
                                                                            <span
                                                                                class="mb-1 badge rounded-pill bg-opacity-25 bg-success fw-bold text-success"><b>Disetujui</b></span>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <a href="#" class="fw-bolder"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#approval-pengajuan">Tanggapi
                                                                                Permintaan</a>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- end row -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="tab-pane" id="innerpill-2" role="tabpanel">
                                        <section class="datatables">
                                            <!-- basic table -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="approval"
                                                                class="table border table-striped text-nowrap">
                                                                <thead>
                                                                    <!-- start row -->
                                                                    <tr>
                                                                        <th>Nipp</th>
                                                                        <th>Nama Izin</th>
                                                                        <th>Posisi</th>
                                                                        <th>Tanggal</th>
                                                                        <th>Nama Atasan</th>
                                                                        <th>Status</th>
                                                                        <th class="text-center">Aksi</th>
                                                                    </tr>
                                                                    <!-- end row -->
                                                                </thead>
                                                                <tbody>
                                                                    <!-- start row -->
                                                                    <tr>
                                                                        <td>Tiger Nixon</td>
                                                                        <td>System Architect</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>61</td>
                                                                        <td>2011/04/25</td>
                                                                        <td>
                                                                            <span
                                                                                class="mb-1 badge rounded-pill bg-opacity-25 bg-success fw-bold text-success"><b>Disetujui</b></span>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <a href="#" class="fw-bolder"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#approval-detail">Lihat
                                                                                Detail</a>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- end row -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div>
                <div class="row mb-4">
                    <div class="col-10 py-2 px-3" style="vertical-align: middle">{{ $subtitle }}</div>
                    <div class="col-2 py-2 d-flex justify-content-end">
                        <a href="{{ route('time-management.izin.create') }}"
                            class="btn btn-primary d-flex align-items-center justify-content-center"
                            style="width: 189px;">
                            <i class="ti ti-plus fs-4 me-2"></i>
                            Form Pengajuan Izin
                        </a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col d-flex justify-content-start align-items-center">
                        <select class="form-control form-select me-2" style="width: 150px;">
                            <option>Status</option>
                        </select>
                        <select class="form-control form-select" style="width: 150px;">
                            <option>Tahun</option>
                        </select>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <button type="button"
                            class="btn mb-1 waves-effect waves-light fw-bolder btn-outline-primary me-2">
                            Cetak Presensi
                        </button>
                        <button type="button" class="btn mb-1 waves-effect waves-light fw-bolder btn-outline-primary">
                            Report Excel
                        </button>
                    </div>
                </div>
                <section class="datatables">
                    <!-- basic table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="table-responsive w-100">
                                    <table id="izin" class="table border table-striped text-nowrap">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe Izin</th>
                                                <th>Tanggal Izin</th>
                                                <th>Jam Izin</th>
                                                <th>Jumlah Jam</th>
                                                <th>Nama Atasan</th>
                                                <th>NIPP Atasan</th>
                                                <th>Telepon</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <!-- end row -->
                                        </thead>
                                        <tbody>
                                            <!-- start row -->
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>
                                                    <span
                                                        class="mb-1 badge rounded-pill bg-opacity-25 bg-success fw-bold text-success"><b>Disetujui</b></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="fw-bolder" data-bs-toggle="modal"
                                                        data-bs-target="#bs-example-modal-md">Lihat Detail
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- end row -->
                                            <!-- start row -->
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>
                                                    <span
                                                        class="mb-1 badge rounded-pill font-medium bg-dark bg-opacity-25 text-dark"><b>Menunggu</b>
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="" class="fw-bolder">Lihat Detail</a>
                                                </td>
                                            </tr>
                                            <!-- end row -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
    </div>
    {{-- End Content --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.section.modal-izin')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#izin').DataTable({
                "searching": false,
                "lengthChange": false,
                "scrollX": true,
                "autoWidth": false,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#pengajuan').DataTable({
                "searching": false,
                "lengthChange": false,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#approval').DataTable({
                "searching": false,
                "lengthChange": false,
            });
        });
    </script>

    <script>
        $("#sa-setuju").click(function() {
            Swal.fire({
                title: "Pengajuan Izin Disetujui",
                text: "Harap cek lanjut status pengajuan formulir izin melalui dashboard halaman izin",
                icon: "success",
                showCancelButton: true,
                confirmButtonText: 'Lihat Status',
                cancelButtonText: 'Ke Halaman Pengajuan Izin',
                // reverseButtons: true, // agar urutan tombol berubah jika diinginkan
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'lihat-status ', // Menambah kelas untuk lebar penuh
                    cancelButton: 'ke-hal-izin' // Menambah kelas untuk lebar penuh
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aksi untuk tombol "Lihat Status"
                    window.location.href = '#'; // URL halaman status
                } else {
                    // Aksi untuk tombol "Ke Halaman Izin"
                    window.location.href = '#'; // URL halaman izin
                }
            });
        });

        $("#sa-tolak").click(function() {
            Swal.fire({
                title: "<strong>Apakah anda ingin membatalkan?</strong>",
                icon: "question",
                html: `
            <p>Berikan alasan kenapa anda membatalkan pengajuan</p>
            <p style="text-align: left;">Alasan Membatalkan Pengajuan</p>
            <textarea id="alasan" class="swal2-input" placeholder="Tuliskan alasan Anda...." style="width: 100%;height:160px; border: 1px solid #ccc; padding: 10px;"></textarea>
        `,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Batalkan Pengajuan', // Tombol di kanan
                cancelButtonText: 'Kembali', // Tombol di kiri
                reverseButtons: true, // agar urutan tombol berubah jika diinginkan
                focusConfirm: false,
                customClass: {
                    cancelButton: 'btn-kembali', // Gaya untuk tombol "Kembali"
                },
                preConfirm: () => {
                    const alasan = document.getElementById('alasan').value;
                    if (!alasan) {
                        Swal.showValidationMessage('Alasan pembatalan wajib diisi!');
                    }
                    return alasan;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const alasan = result.value;
                    console.log("Alasan Pembatalan:", alasan);
                    Swal.fire({
                        title: "Pengajuan Izin Ditolak",
                        text: "Harap cek lanjut status pengajuan formulir izin melalui dashboard halaman izin",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Ke Halaman Pengajuan Izin',
                        cancelButtonText: 'Lihat Status',
                        // reverseButtons: true, // agar urutan tombol berubah jika diinginkan
                        customClass: {
                            actions: 'my-actions',
                            confirmButton: 'lihat-status', // Menambah kelas untuk lebar penuh
                            cancelButton: 'ke-hal-izin', // Menambah kelas untuk lebar penuh
                            icon: 'custom-warning'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Aksi untuk tombol "Lihat Status"
                            window.location.href = '#'; // URL halaman status
                        } else {
                            // Aksi untuk tombol "Ke Halaman Izin"
                            window.location.href = '#'; // URL halaman izin
                        }
                    });
                }
            });
        });
    </script>
@endsection
