@extends('layouts.app')

@section('content')
    <div class="contaner">
        {{-- Breadcrumb --}}
        @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
        {{-- End Breadcrumb --}}
        <div>
            <h4 class="fw-semibold mt-3 text-secondary-kai h2 ">{{ $title }}</h4>
        </div>
        <div class="row mb-4">
            <div class="col-9 py-2 px-3" style="vertical-align: middle">{{ $subtitle }}</div>
            <div class="col-3 py-2 d-flex justify-content-end">
                <a href="{{ route('time-management.izin.create') }}"
                    class="btn btn-primary d-flex align-items-center justify-content-center" style="width: 189px;">
                    <i class="ti ti-plus fs-4 me-2"></i>
                    Form Pengajuan Izin
                </a>
            </div>
        </div>
        {{-- JIKA DIA ATASAN --}}
        @if ($atasan['atasan'] == 'X')
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
                                <select class="form-control form-select me-2 w-25">
                                    @foreach ($statusOptions as $status)
                                        <option value="{{ $status['idStatus'] }}">{{ $status['namaStatus'] }}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="datepicker" class="form-control w-25" placeholder="Tahun"
                                    >
                            </div>
                            <div class="col d-flex justify-content-end align-items-center">
                                <a href="#"
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
                                            <table id="izin-datatables-atasan"
                                                class="table border table-striped text-nowrap">
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
                                                            <table id="izin-pengajuan-datatables"
                                                                class="table border table-striped text-nowrap">
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
                                                            <table id="izin-approval-datatables"
                                                                class="table border table-striped text-nowrap w-100">
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
            <div class="row mb-4">
                <div class="col d-flex justify-content-start align-items-center">
                    <select class="form-control form-select me-2 filter w-25">
                        @foreach ($statusOptions as $status)
                            <option value="{{ $status['idStatus'] }}">{{ $status['namaStatus'] }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="datepicker" class="form-control w-25" placeholder="Tahun">
                </div>
                <div class="col d-flex justify-content-end align-items-center">
                    <button type="button" class="btn mb-1 waves-effect waves-light fw-bolder btn-outline-primary me-2">
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
                                <table id="izin-datatables" class="table border table-striped text-nowrap">
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
    {{-- <script>
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
    </script> --}}
@endsection
