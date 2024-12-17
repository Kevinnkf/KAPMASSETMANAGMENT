@extends('layouts.app')

@section('styles')

    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />

    <style>
        .esa-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .esa-header-dark {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 28px;
            line-height: 32px;
            letter-spacing: -0.019em;
            text-align: left;
            color: #202020;
        }

        .esa-subheader-dark-grey {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -0.011em;
            text-align: left;
            padding-top: 1rem;
            color: #818181;
        }
    </style>

    <style>
        .esa-card-container {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            border-radius: 0.5rem;
        }

        .esa-card {
            background-color: #F2F8FF;
            padding: 1rem;
            border-radius: 0.5rem;
            width: 33%;
            /* box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1); */
        }

        .esa-card h3 {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -0.011em;
            text-align: left;
            color: #202020;
            margin: 0;
        }

        .esa-card h2 {
            font-family: 'Open Sans', sans-serif;
            font-size: 18px;
            font-weight: 600;
            line-height: 20px;
            letter-spacing: -0.014em;
            text-align: left;
            color: #0B56A7;
            margin: 12px 0;
        }

        .esa-card-content {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem 0rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.625rem;
        }

        .esa-card-content-box {
            width:33.3%;
            display: flex;
            justify-content: center; /* Horizontally centers the content */
            align-items: center;     /* Vertically centers the content */
        }

        .esa-card-content div {
            text-align: center;
        }

        .esa-card-content div p {
            margin: 5px 0;
        }

        .esa-card-value {
            font-family: 'Open Sans', sans-serif;
            font-size: 24px;
            font-weight: 600;
            line-height: 28px;
            letter-spacing: -0.019em;
            padding: 0.5rem;
        }

        .esa-card-sub-value {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            letter-spacing: -0.006em;
            color: #202020;
        }

        .esa-sisa-cuti-primary {
            color: #0b56a7;
        }

        .esa-sisa-cuti-danger {
            color: #E6251C;
        }

        .esa-divider {
            width: 0.125rem;
            background-color: #ddd;
            height: 4rem;
        }
        /* Dropdown container styling */
        .custom-dropdown {
            position: relative;
            background-color: #fff;
        }

        .dropdown-header {
            cursor: pointer;
            padding: 10px;
            font-weight: bold;
        }

        .dropdown-content {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-top: none;
            z-index: 1000;
        }

        .dropdown-content.hidden {
            display: none;
        }

        .dropdown-group {
            border-top: 1px solid #ddd;
        }

        .dropdown-header-group {
            padding: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .dropdown-options {
            display: none; /* Initially hidden */
            padding: 5px 10px;
        }

        .dropdown-options .dropdown-option {
            padding: 5px 0;
            cursor: pointer;
        }

        .dropdown-options .dropdown-option:hover {
            background-color: #f0f0f0;
        }

        .dropdown-options.active {
            display: block;
        }
    </style>

@section('content')
    {{-- Breadcrumb --}}
    
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
        <div class="esa-card-container w-100">
            <div class="esa-card w-100">
                <h3>Data Asset</h3>
                <h2></h2>
                <div class="esa-card-content">
                    <div class="esa-card-content-box">
                        <div>
                            <div class="esa-card-value esa-sisa-cuti-primary">{{$countAsset}}</div>
                            <p class="esa-card-sub-value">Asset tersedia</p>
                        </div>
                    </div>
                    <div class="esa-divider"></div>
                    <div class="esa-card-content-box">
                        <div>
                            <div class="esa-card-value esa-sisa-cuti-danger">{{$destroyedAsset}}</div>
                            <p class="esa-card-sub-value">Asset dihapus</p>
                        </div>
                    </div>
                    <div class="esa-divider"></div>
                    <div class="esa-card-content-box">
                        <div>
                            <div class="esa-card-value esa-sisa-cuti-primary">{{$inMtc}}</div>
                            <p class="esa-card-sub-value">Asset dalam perbaikan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <section class="datatables">
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <!-- Filter Table -->
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="py-4">
                                    <div class="esa-filter-container">
                                        <form action="{{ route('searchAssets') }}" method="GET" class="mb-4">
                                            <div class="flex items-center">
                                                <input type="text" name="search" placeholder="Search name, brand, model, series, category, serial number, type, condition" style="width: 50%" class="p-2 border rounded w-[100%]">
                                                <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="esa-filter-container">
                                        <form action="{{ route('transaction.asset.export') }}" method="GET" class="mb-4">
                                            <div class="flex items-center">
                                                <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-warning esa-btn"><i class="fa fa-download"></i> Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="py-4">
                                    <div class="esa-filter-container">
                                        <form action="{{ route('searchAssets') }}" method="GET" class="mb-4">
                                            <div class="flex items-center">
                                                <div class="custom-dropdown p-2 border rounded w-[100%]">
                                                    <!-- Dropdown Header -->
                                                    <div class="dropdown-header has-arrow" onclick="toggleDropdown()">Filter</div>
                                                    @php
                                                        // Get unique brand values from the master data
                                                        $getBrand = array();
                                                        $getCondition = array();
                                                        $getCategory = array();
                                                        foreach ($masterData as $master) {
                                                            // Check if 'brand' key exists in the array
                                                            if (isset($master['description']) && ($master['condition'] == 'ASSET_BRAND')) {
                                                                $getBrand[] = $master['description'];
                                                            }
                                                        }
                                                        foreach ($assetDatafull as $asset) {
                                                            if ($asset['condition']) {
                                                                $getCondition[] = $asset['condition'];
                                                            }
        
                                                            if ($asset['assetcategory']) {
                                                                $getCategory[] = $asset['assetcategory'];
                                                            }
                                                        }
                                                        $uniqueBrand = array_unique($getBrand);
                                                        $uniqueCondition = array_unique($getCondition);
                                                        $uniqueCategory = array_unique($getCategory);
                                                    @endphp
                                                    <div id="dropdown-content" class="dropdown-content hidden">
                                                        <!-- Brand Group -->
                                                        <div class="dropdown-group">
                                                            <div class="dropdown-header-group" onclick="toggleOptions('brand-group')">Brand</div>
                                                            <div id="brand-group" class="dropdown-options">
                                                                @foreach ($uniqueBrand as $optionvalue)
                                                                    <div class="dropdown-option has-arrow" data-value="{{ $optionvalue }}" onclick="selectOption(this, '{{ $optionvalue }}')">
                                                                        {{ $optionvalue }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="dropdown-header-group" onclick="toggleOptions('codition-group')">Condition</div>
                                                            <div id="codition-group" class="dropdown-options has-arrow">
                                                                @foreach ($uniqueCondition as $optionvalue)
                                                                    <div class="dropdown-option" data-value="{{ $optionvalue }}" onclick="selectOption(this, '{{ $optionvalue }}')">
                                                                        {{ $optionvalue }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="dropdown-header-group" onclick="toggleOptions('category-group')">Category</div>
                                                            <div id="category-group" class="dropdown-options has-arrow">
                                                                @foreach ($uniqueCategory as $optionvalue)
                                                                    <div class="dropdown-option" data-value="{{ $optionvalue }}" onclick="selectOption(this, '{{ $optionvalue }}')">
                                                                        {{ $optionvalue }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Hidden Input Field for Submission -->
                                                <input type="hidden" name="search" id="selected-filter">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive">
                            <table id="master" class="table table-striped display nowrap esa-table-light">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Aset</th>
                                        <th>Nama Karyawan</th>
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
                                        <td>{{ isset($asset['employee']) ? $asset['employee']['name'] : 'IT' }}</td>
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
                                <!-- Start Page Link -->
                                <li class="page-item {{ $assetData->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $assetData->onFirstPage() ? '#' : $assetData->url(1) }}">
                                        Start
                                    </a>
                                </li>
                                
                                {{-- <li class="page-item {{ $assetData->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $assetData->onFirstPage() ? '#' : $assetData->previousPageUrl() }}">
                                        Previous
                                    </a>
                                </li> --}}
                        
                                @php
                                    $currentPage = $assetData->currentPage();
                                    $lastPage = $assetData->lastPage();
                                    $maxLinks = 10; // Maximum number of links to display
                                    $half = floor($maxLinks / 2);
                                    $start = max(1, $currentPage - $half);
                                    $end = min($lastPage, $currentPage + $half);
                        
                                    // Adjust start and end if there are not enough pages
                                    if ($end - $start < $maxLinks - 1) {
                                        if ($start == 1) {
                                            $end = min($lastPage, $start + $maxLinks - 1);
                                        } else {
                                            $start = max(1, $end - $maxLinks + 1);
                                        }
                                    }
                                @endphp
                        
                                <!-- Pagination Elements -->
                                @for ($page = $start; $page <= $end; $page++)
                                    <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $assetData->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor
                        
                                <!-- Next Page Link -->
                                {{-- <li class="page-item {{ $assetData->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $assetData->hasMorePages() ? $assetData->nextPageUrl() : '#' }}">
                                        Next
                                    </a>
                                </li> --}}
                                <!-- End Page Link -->
                                <li class="page-item {{ $assetData->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $assetData->hasMorePages() ? $assetData->url($lastPage) : '#' }}">
                                        End
                                    </a>
                                </li>
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

function toggleDropdown() {
    // Get the dropdown content
    const dropdownContent = document.getElementById('dropdown-content');
    // Toggle the hidden class to show or hide the dropdown
    dropdownContent.classList.toggle('hidden');
}

function toggleOptions(groupId) {
    const group = document.getElementById(groupId);
    group.classList.toggle('active'); // Toggle visibility of options
}

function selectOption(optionElement, value) {
    // Set the value in the hidden input field
    document.getElementById('selected-filter').value = value;

    // Submit the form automatically
    optionElement.closest('form').submit();
}

// Close dropdown when clicking outside
document.addEventListener('click', (event) => {
    const dropdown = document.querySelector('.custom-dropdown');
    if (!dropdown.contains(event.target)) {
        document.getElementById('dropdown-content').classList.add('hidden');
    }
});

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
