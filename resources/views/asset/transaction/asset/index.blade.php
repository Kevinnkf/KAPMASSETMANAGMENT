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
                <a href="{{ route('master.type.create', ['condition' => $condition]) }}"
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
                                        <th>ID</th>
                                        <th>Kode Aset</th>
                                        <th>NIPP</th>
                                        <th>Tipe</th>
                                        <th>Kategori</th>
                                        <th>Merk</th>
                                        <th>Nomor Serial</th>
                                        <th>Kondisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody id="table-master">
                                    @foreach($assetData as $asset)
                                    <tr>
                                        <td>{{ $asset['idasset'] }}</td>
                                        <td>{{  $asset['assetcode'] }}</td>
                                        <td>{{  $asset['nipp'] }}</td>
                                        <td>{{  $asset['assettype'] }}</td>
                                        <td>{{  $asset['assetcategory'] }}</td>
                                        <td>{{  $asset['assetbrand'] }} {{  $asset['assetmodel'] }} {{  $asset['assetseries'] }}</td>
                                        <td>{{  $asset['assetserialnumber'] }}</td>
                                        <td>{{  $asset['condition'] }}</td>
                                        <td class="action-buttons">
                                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="height:36px"   onclick="window.location.href='{{ route('transaction.asset.laptop', ['assetcode' => $asset['assetcode'] ?? 'N/A']) }}'">Detail</button>
                                        </td>
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
function openEditModal(assetData) {
    console.log(assetData);
    document.getElementById('masterid').value = assetData.masterid;
    document.getElementById('condition').value = assetData.condition;
    document.getElementById('nosr').value = assetData.nosr;
    document.getElementById('description').value = assetData.description;
    document.getElementById('valuegcm').value = assetData.valuegcm;
    document.getElementById('typegcm').value = assetData.typegcm;
    document.getElementById('active').value = assetData.active;

      // Populate other form fields as necessary
      
      document.getElementById('editModal').classList.remove('hidden');
  }

  // Function to close modal
  function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
      document.getElementById('deleteModal').classList.add('hidden');
  }

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
