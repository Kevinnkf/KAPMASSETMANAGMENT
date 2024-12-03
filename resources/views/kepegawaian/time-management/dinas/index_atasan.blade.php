@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
    {{-- End Breadcrumb --}}

    {{-- Content --}}
    <div class="row align-items-center">
        <div class="col">
            <h4 class="fw-semibold mt-3 text-primary-kai">{{ $title }}</h4>
        </div>
        <div class="row" style="padding-right: 0">
            <div class="col-9">{{ $subtitle }}</div>
            <div class="col-3 text-end p-0 py-2 d-flex justify-content-end">
                <a href="{{ route('dinas.create') }}"
                    class="btn btn-primary d-flex align-items-center justify-content-center m-0">
                    <i class="ti ti-plus fs-4 me-1"></i>Pengajuan Form Dinas
                </a>
            </div>
        </div>
    </div>
    @if ($atasan['atasan'] == 'X')
        <div class="card-body">
            <section class="datatables">
                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-underline w-100" role="tablist">
                            <li class="nav-item col-6 text-center">
                                <a class="nav-link active w-100" data-bs-toggle="tab" href="#navpill-1" role="tab"
                                    style="border-radius: 0;">
                                    <span>Pengajuan</span>
                                </a>
                            </li>
                            <li class="nav-item col-6 text-center">
                                <a class="nav-link w-100" data-bs-toggle="tab" href="#navpill-2" role="tab"
                                    style="border-radius: 0;">
                                    <span>Approval(5)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tab panes -->
                <div class="tab-content mt-2">
                    <!-- Halaman Pribadi content -->
                    <div class="tab-pane active" id="navpill-1" role="tabpanel">
                        <!-- Content for Halaman Pribadi -->
                        <section class="datatables">
                            <!-- basic table -->
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="date" class="form-control" placeholder="Periode">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dinas-datatables-atasan" class="table border table-striped text-nowrap"
                                    style="font-size: 12px">
                                </table>
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
                                            <span>Persetujuan</span><span class="badge-rounded ms-auto">2</span>
                                        </a>
                                    </li>
                                    <li class="nav-item col-6 text-center">
                                        <a class="nav-link w-100" data-bs-toggle="tab" href="#innerpill-2" role="tab">
                                            <span>Dinas Operator</span><span class="badge-rounded ms-auto">2</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="innerpill-1" role="tabpanel">
                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" placeholder="Periode">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="NIPP"
                                                        style="padding-right: 2.5rem">
                                                    <i
                                                        class="ti ti-search position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-select">
                                                    <option>Status</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="table-responsive w-100 mt-3">
                                            <table id="dinas-pengajuan-datatables"
                                                class="table border table-striped text-nowrap" style="font-size: 12px;">
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="innerpill-2" role="tabpanel">
                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" placeholder="Periode">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="NIPP">
                                                    <i
                                                        class="ti ti-search position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-select">
                                                    <option>Status</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIPP</th>
                                                        <th>Nama</th>
                                                        <th>Organisasi Unit</th>
                                                        <th>Persolan Area</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>122334444</td>
                                                        <td>Falah Ocktafian Akbar Putera</td>
                                                        <td>UPT Resort Jalan Rel 3,15 Ciledung</td>
                                                        <td>Daop III Cirebon</td>
                                                        <td><a href="{{ route('dinas.listoperator') }}"
                                                                class="text-primary">Lihat Detail</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>122334444</td>
                                                        <td>Nadhifa Yudistirawan Sudankosli</td>
                                                        <td>UPT Resort Jalan Rel 3,15 Ciledung</td>
                                                        <td>Daop III Cirebon</td>
                                                        <td><a href="#" class="text-primary">Lihat Detail</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span>Showing 1 to 3 of 3 data</span>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link"
                                                            href="#">Previous</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link"
                                                            href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @else
        <div class="card-body">
            {{-- searching --}}
            <div class="row mb-4 mx-0 gap-3 d-flex align-items-end">
                <div class="col-sm-2 px-0">
                    <div class="input-group">
                        <input type="date" class="form-control" id="bs-datepicker-format" placeholder="Periode"
                            onkeydown="search(this)">
                    </div>
                </div>
            </div>
            {{-- End Searching --}}

            {{-- table --}}
            <section class="datatables">
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="table-responsive w-100">
                                <table id="dinas-datatables" class="table border table-striped text-nowrap"
                                    style="font-size: 12px;">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
    {{-- End Content --}}


    <div id="modal-tanggapi" class="modal fade" aria-labelledby="bs-example-modal-md" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                @include('kepegawaian.time-management.dinas.modal_tanggapi')
            </div>
        </div>
    </div>
    <div id="modal-detail" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                @include('kepegawaian.time-management.dinas.modal_detail')
            </div>
        </div>
    </div>
    {{-- <div id="modal-cetak" class="modal fade" id="suratDinasModal" tabindex="-1" aria-labelledby="suratDinasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="suratDinasModalLabel">Detail Dokumen - Surat Dinas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="pdfViewer">
                <!-- PDF viewer akan dimuat di sini -->
                @include('kepegawaian.time-management.dinas.cetak')
              </div>
            </div>
          </div>
        </div>
    </div> --}}
@endsection
<style>
    .modal-body {
        padding: 0;
    }

    #pdfViewer {
        width: 100%;
        height: 600px;
    }
</style>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dinas').DataTable({
                "lengthChange": false,
                "searching": false
            });
        });

        import {
            pdfjs
        } from 'pdfjs-dist';
        pdfjs.GlobalWorkerOptions.workerSrc = 'path/to/pdf.worker.js';

        document.addEventListener('DOMContentLoaded', function() {
            const pdfViewer = document.getElementById('pdfViewer');

            // Fungsi untuk memuat PDF
            function loadPDF(url) {
                pdfjs.getDocument(url).promise.then(function(pdf) {
                    pdf.getPage(1).then(function(page) {
                        const scale = 1.5;
                        const viewport = page.getViewport({
                            scale: scale
                        });
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };

                        page.render(renderContext);
                        pdfViewer.appendChild(canvas);
                    });
                });
            }

            // Panggil fungsi loadPDF saat modal dibuka
            $('#suratDinasModal').on('shown.bs.modal', function() {
                loadPDF('path/to/your/surat-dinas.pdf');
            });
        });
    </script>
@endsection
