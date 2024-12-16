@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    {{-- End Breadcrumb --}}

    {{-- Content --}}
    <div class="row align-items-center">
        <div class="col">
            <h4 class="fw-semibold mt-3 text-primary-kai">Master Aset</h4>
        </div>
        <div class="row">
            <div class="col-10"></div>
            <div class="col-auto">
                @if (!empty($currentCondition))
                <a href="{{ route('master.type.create', ['condition' => $currentCondition]) }}"
                    class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2 " style="margin-left: 1px;"></i>Add Master Data
                </a>
                @else
                <p></p>
                @endif
            </div>
        </div>
    </div>
    {{-- End Content --}}
    <div class="card-body">
        {{-- searching --}}
        
        {{-- End Searching --}}

        {{-- table --}}
        <section class="datatables">
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <!-- Filter Table -->
                        <div class="py-4">
                            <div class="esa-filter-container">
                                <div>
                                    @if (session('success'))
                                    <h3 class="text-success">{{ session('success') }}</h3>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive">
                            <table id="master" class="table table-striped display nowrap esa-table-light">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Master ID</th>
                                        <th>Kondisi</th>
                                        <th>Nomor Serial</th>
                                        <th>Deskripsi</th>
                                        <th>Value</th>
                                        <th>Tipe</th>
                                        <th>Active</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody id="table-master">
                                    @foreach($masterData as $master)
                                    <tr>
                                        <td>{{ $master['masterid'] }}</td>
                                        <td>{{  $master['condition'] }}</td>
                                        <td>{{  $master['nosr'] }}</td>
                                        <td>{{  $master['description'] }}</td>
                                        <td>{{  $master['valuegcm'] }}</td>
                                        <td>{{  $master['typegcm'] }}</td>
                                        <td>{{  $master['active'] }}</td>
                                        <td class="action-buttons">
                                            <a href="#modalMaster" 
                                                data-bs-toggle="modal" 
                                                class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" 
                                                onclick="openMasterModal({{ json_encode($master) }})">
                                                Update
                                            </a>
                                            
                                        </td>
                                        @include('asset.master.type.modal')
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($masterData->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $masterData->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif
                        
                                <!-- Pagination Elements -->
                                @foreach ($masterData->links()->elements[0] as $page => $url)
                                    @if ($page == $masterData->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                        
                                <!-- Next Page Link -->
                                @if ($masterData->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $masterData->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
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
        const url = "{{ route('time-management.izin.index') }}";
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
