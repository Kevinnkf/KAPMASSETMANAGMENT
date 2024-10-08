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
        <div class="row">
            <div class="col-10">Berikut ini adalah daftar pengajuan dinas karyawan anda</div>
            <div class="col-auto">
                <a href="{{ route('dinas.create') }}" class="justify-content-between w-100 btn mb-1 btn-primary d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2 " style="margin-left: 1px;"></i>Pengajuan Form Dinas
                </a>
            </div>
        </div>
    </div>
    {{-- End Content --}}
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
                                <table id="dinas" class="table border table-striped text-nowrap">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Dinas</th>
                                            <th>Tujuan Dinas</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Jam Mulai</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        <tr>
                                            <td>1</td>
                                            <td>Dinas luar</td>
                                            <td>Bandung</td>
                                            <td>24 November 2022</td>
                                            <td>24 November 2022</td>
                                            <td>15:00</td>
                                            <td class="text-center">
                                                <a href="{{ route('dinas.cetak', 1) }}" class="fw-bolder" target="_blank">Cetak</a>
                                                <button type="button" onclick="lihatdok('{{ 1 }}')">Lihat Dokumen</button>

<script>
    function lihatdok() {
        var url = "{{ route('dinas.cetak', ':id') }}";
        url = url.replace(':id');
        window.open(url, '_blank');
    }
</script>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Dinas luar</td>
                                            <td>Jakarta</td>
                                            <td>27 November 2021</td>
                                            <td>27 November 2021</td>
                                            <td>15:00</td>
                                            <td class="text-center">
                                                <a href="{{ route('dinas.cetak', 1) }}" class="fw-bolder ">Cetak</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Perjalanan Dinas</td>
                                            <td>Jakarta</td>
                                            <td>1 Desember 2022</td>
                                            <td>1 Desember 2022</td>
                                            <td>15:00</td>
                                            <td class="text-center">
                                                <a href="{{ route('dinas.cetak', 1) }}" class="fw-bolder ">Cetak</a>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-wrapper">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span>Showing 1 to 3 of 3 data</span>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
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
                                                    <input type="text" class="form-control" placeholder="NIPP" style="padding-right: 2.5rem">
                                                    <i class="ti ti-search position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
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
                                                        <th>Posisi</th>
                                                        <th>Jenis Dinas</th>
                                                        <th>Tujuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>122334444</td>
                                                        <td>Falah Ocktafian Akbar Putera</td>
                                                        <td>Staff</td>
                                                        <td>Dinas Luar</td>
                                                        <td>Bandung</td>
                                                        <td><a class="text-primary" data-bs-toggle="modal" data-bs-target="#modal-tanggapi">Tanggapi</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>122334444</td>
                                                        <td>Nadhifa Yudistirawan Sudankosli</td>
                                                        <td>Staff</td>
                                                        <td>Perjalanan Dinas</td>
                                                        <td>Jakarta</td>
                                                        <td><a class="text-primary" data-bs-toggle="modal" data-bs-target="#modal-detail">Lihat Detail</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>122334444</td>
                                                        <td>Darussalam</td>
                                                        <td>Staff</td>
                                                        <td>Dinas Luar</td>
                                                        <td>Bandung</td>
                                                        <td><a class="text-primary" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md">Lihat Detail</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span>Showing 1 to 3 of 3 data</span>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul>
                                            </nav>
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
                                                    <i class="ti ti-search position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
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
                                                        <td><a href="{{ route('dinas.listoperator') }}" class="text-primary">Lihat Detail</a></td>
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
                                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="modal-tanggapi" class="modal fade" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                @include('kepegawaian.time-management.dinas.modal_tanggapi')
            </div>
        </div>
    </div>
    <div id="modal-detail" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
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

    import { pdfjs } from 'pdfjs-dist';
pdfjs.GlobalWorkerOptions.workerSrc = 'path/to/pdf.worker.js';

document.addEventListener('DOMContentLoaded', function() {
  const pdfViewer = document.getElementById('pdfViewer');
  
  // Fungsi untuk memuat PDF
  function loadPDF(url) {
    pdfjs.getDocument(url).promise.then(function(pdf) {
      pdf.getPage(1).then(function(page) {
        const scale = 1.5;
        const viewport = page.getViewport({ scale: scale });
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
