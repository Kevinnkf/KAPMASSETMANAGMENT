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
            <div class="col-10">{{ $subtitle }}</div>
            <div class="col-auto">
                <a href="{{ route('dinas.create') }}" class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2 " style="margin-left: 1px;"></i>Pengajuan Form Dinas
                </a>
            </div>
        </div>
    </div>
    {{-- End Content --}}
    <div class="card-body">
        {{-- searching --}}
        <div class="row mb-4 mx-0 gap-3 d-flex align-items-end">
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
        </div>
        {{-- End Searching --}}
        
        {{-- table --}}
        <section class="datatables">
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
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
                                            <a href="{{ route('dinas.cetakoperator', 1) }}" class="fw-bolder ">Cetak</a>
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
                                            <a href="{{ route('dinas.cetakoperator', 1) }}" class="fw-bolder ">Cetak</a>
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
                                            <a href="{{ route('dinas.cetakoperator', 1) }}" class="fw-bolder ">Cetak</a>
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
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#dinas').DataTable({
            "lengthChange": false,
            "searching": false
        });
    });
</script>
@endsection
