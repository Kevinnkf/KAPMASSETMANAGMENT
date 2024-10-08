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
            <div class="col-sm-2 px-0">
                <div class="input-group">
                    <input type="date" class="form-control" id="bs-datepicker-format" placeholder="Periode" onkeydown="search(this)">
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
                                <tbody id="table-dinas">
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

<script>
    const tableDinas = document.getElementById('table-dinas');
    const url = "{{ route('api.dinas.index') }}";
    fetch(url)
    .then(response => response.json())
    .then(data => {
        let isi = '';
        data.forEach((item, index) => {
            isi += `<tr>
                <td>${index+1}</td>
                <td>${item.jenis_dinas}</td>
                <td>${item.tujuan_dinas}</td>
                <td>${item.tanggal_mulai}</td>
                <td>${item.tanggal_berakhir}</td>
                <td>${item.jam_mulai}</td>
                <td class="text-center">
                    <a href="${item.link_cetak}" class="fw-bolder ">Cetak</a>
                    <a href="${item.link_detail}" class="fw-bolder ">Lihat Detail</a>
                </td>
            </tr>`
        });
        tableDinas.innerHTML = isi;
    });
</script>
@endsection
