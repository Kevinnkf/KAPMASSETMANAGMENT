@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
    {{-- End Breadcrumb --}}

    {{-- Top Bar --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.topbar')
    {{-- End Top Bar --}}

    {{-- Pengumuman 1 --}}
    <div class="alert alert-primary bg-light alert-dismissible mt-1" role="alert">
        <div class="row align-items-center">
            <div class="col-auto">
                <i class="ti ti-help"></i>
            </div>
            <div class="col">
                <p>Pemetaan pegawai dilakukan sistem berdasarkan struktur organisasi dan data kepegawaian SAP HR per 15
                    November 2022.</p>
                <p class="pb-0 mb-0">Jika terdapat ketidaksesuaian / tidak mengenal yang dinilai, dapat menghubungi MCDC
                    Kantor Pusat untuk wilayah kantor Pusat di Toka 16421/16422/16423 dan WA Helpdesk MCDM 082118686959,
                    sedangkan untuk daerah dapat menghubungi operator sdm daerah masing-masing.</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- End Pengumuman 1 --}}

    {{-- Pengumuman 2 --}}
    <div class="alert alert-primary bg-light alert-dismissible mt-3" role="alert">
        <div class="row align-items-center">
            <div class="col-auto">
                <i class="ti ti-help"></i>
            </div>
            <div class="col">
                <h5 class="fw-medium pb-0 mb-0">Petunjuk Asesmen</h5>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- End Pengumuman 2 --}}

    {{-- Content --}}
    <div class="row align-items-center">
        <div class="col">
            <h4 class="fw-semibold mt-3 text-primary-kai">Asesmen Multirater 360</h4>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-outline-dark">
                Profil Kompetensi
            </button>
            <button type="button" class="btn btn-primary">
                Hasil Asesmen Multirater
            </button>
        </div>


        <ul class="nav nav-pills user-profile-tab px-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-asesmen-multirater-360-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-asesmen-multirater-360" type="button" role="tab"
                    aria-controls="pills-asesmen-multirater-360" aria-selected="true">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Asesmen Multirater 360</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-asesmen-multirater-360-dinilai-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-asesmen-multirater-360-dinilai" type="button" role="tab"
                    aria-controls="pills-asesmen-multirater-360-dinilai" aria-selected="false">
                    <i class="ti ti-bell me-2 fs-6"></i>
                    <span class="d-none d-md-block">Asesmen Multirater 360 Yang Harus Dinilai</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-skor-akhir-sudah-dinilai-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-skor-akhir-sudah-dinilai" type="button" role="tab"
                    aria-controls="pills-skor-akhir-sudah-dinilai" aria-selected="false">
                    <i class="ti ti-article me-2 fs-6"></i>
                    <span class="d-none d-md-block">Skor Akhir yang Sudah Dinilai</span>
                </button>
            </li>
        </ul>

        <div class="card-body px-3">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-asesmen-multirater-360" role="tabpanel"
                    aria-labelledby="pills-asesmen-multirater-360-tab" tabindex="0">
                    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.dashboard.section-asesmen-multirater-360')
                </div>
                <div class="tab-pane fade" id="pills-asesmen-multirater-360-dinilai" role="tabpanel"
                    aria-labelledby="pills-asesmen-multirater-360-dinilai-tab" tabindex="0">
                    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.dashboard.section-asesmen-multirater-360-harus-dinilai')
                </div>
                <div class="tab-pane fade" id="pills-skor-akhir-sudah-dinilai" role="tabpanel"
                    aria-labelledby="pills-skor-akhir-sudah-dinilai-tab" tabindex="0">
                    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.dashboard.section-asesmen-multirater-360-sudah-dinilai')
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            fetchingDatatable();

            $("#dropdown_year_sudah_dinilai").select2({
                allowClear: true,
                placeholder: "Tahun",
            });
        });


        function fetchingDatatable() {
            fetchingDatatableAsesmenMultirater360();
            fetchingDatatableAsesmenMultirater360HarusDinilai();
            fetchingDatatableSkorAkhirSudahDinilai();
        }

        function fetchingDatatableAsesmenMultirater360() {
            var url_data_table = null;
            var searching = null;
            var tag = null;
            var type = null;
            var dataTable = $("#table-asesmen-multirater-360").DataTable({
                destroy: true,
                sDom: 'lrtip',
                processing: true,
                serverSide: true,
                fixedColumns: {
                    right: 1,
                    left: 0,
                },
                paging: true,
                scrollX: true,
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                pageLength: 10,
                ajax: url_data_table,
                order: [],
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false
                    },
                    {
                        data: 'nipp'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'status',
                        orderable: false,
                        width: "100px"
                    }
                ],
                columnDefs: [{
                    // className: "dt-center",
                    // targets: [0, 2, 3, 5]
                    // targets: "_all"
                }],
                language: {
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Selanjutnya"
                    }
                }
            });
        }

        function fetchingDatatableAsesmenMultirater360HarusDinilai() {
            var url_data_table = null;
            var searching = null;
            var tag = null;
            var type = null;
            var dataTable = $("#table-asesmen-multirater-360-harus-dinilai").DataTable({
                destroy: true,
                sDom: 'lrtip',
                processing: true,
                serverSide: true,
                fixedColumns: {
                    right: 1,
                    left: 0,
                },
                paging: true,
                scrollX: true,
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                pageLength: 10,
                ajax: url_data_table,
                order: [],
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false
                    },
                    {
                        data: 'nipp'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'posisi'
                    },
                    {
                        data: 'status',
                        orderable: false,
                        width: "100px"
                    }
                ],
                columnDefs: [{
                    // className: "dt-center",
                    // targets: [0, 2, 3, 5]
                    // targets: "_all"
                }],
                language: {
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Selanjutnya"
                    }
                }
            });
        }

        function fetchingDatatableSkorAkhirSudahDinilai() {
            var url_data_table = null;
            var searching = null;
            var tag = null;
            var type = null;
            var dataTable = $("#table-asesmen-multirater-360-sudah-dinilai").DataTable({
                destroy: true,
                sDom: 'lrtip',
                processing: true,
                serverSide: true,
                fixedColumns: {
                    right: 1,
                    left: 0,
                },
                paging: true,
                scrollX: true,
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                pageLength: 10,
                ajax: url_data_table,
                order: [],
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false
                    },
                    {
                        data: 'nipp'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'posisi'
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'skor_akhir'
                    },
                    {
                        data: 'kategori'
                    },
                    {
                        data: 'aksi',
                        orderable: false,
                        width: "100px"
                    }
                ],
                columnDefs: [{
                    // className: "dt-center",
                    // targets: [0, 2, 3, 5]
                    // targets: "_all"
                }],
                language: {
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Selanjutnya"
                    }
                }
            });
        }
    </script>
@endsection
