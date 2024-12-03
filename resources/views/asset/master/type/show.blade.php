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
                                        <td class="action-buttons">
                                            <button class="btn mb-1 waves-effect waves-light btn-outline-danger esa-btn">Delete</button>
                                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="height:36px">Update</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex -space-x-px text-sm">
                                <!-- Previous Page Link -->
                                @if ($masterData->onFirstPage())
                                    <li>
                                        <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-gray-200 border border-gray-300 rounded-s-lg cursor-not-allowed">
                                            Previous
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $masterData->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-800">
                                            Previous
                                        </a>
                                    </li>
                                @endif
                        
                                <!-- Pagination Elements -->
                                @foreach ($masterData->links()->elements[0] as $page => $url)
                                    @if ($page == $masterData->currentPage())
                                        <li>
                                            <span class="flex items-center justify-center px-3 h-8 text-white border border-gray-300 bg-blue-600 hover:bg-blue-700 hover:text-white">
                                                {{ $page }}
                                            </span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                        
                                <!-- Next Page Link -->
                                @if ($masterData->hasMorePages())
                                    <li>
                                        <a href="{{ $masterData->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-800">
                                            Next
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-200 border border-gray-300 rounded-e-lg cursor-not-allowed">
                                            Next
                                        </span>
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
