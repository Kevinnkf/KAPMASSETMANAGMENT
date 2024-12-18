@extends('layouts.app')

@section('content')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="flex-row justify-between">
        <div class="flex flex-wrap justify-between gap-4 p-6 bg-white">
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Asset Available </h5>
                <p class="font-normal text-xl text-gray-700">{{$countAsset}}</p>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> Destroyed Asset </h5>
                <p class="font-normal text-xl text-gray-700">{{ $destroyedAsset }}</p>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> In Maintenance </h5>
                <p class="font-normal text-xl text-gray-700">{{ $inMtc }}</p>
            </div>
        </div>
    </div>
    <div class="flex-col justify-between">
        <div class="p-6 pb-0 mb-2 bg-white rounded-t-2xl">
            {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='{{ route('transaction.create') }}'">
                Add Asset
            </button> --}}
        </div>
      </div>
      <div class="flex-auto px-0 pt-0 pb-2 space-x-5">
        <div class="p-4 overflow-x-auto">
            <form action="{{ route('searchAssets') }}" method="GET" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="search" placeholder="Search name, brand, model, series, category, serial number, type, condition" class="p-2 border rounded w-[50%]">
                    <button type="submit" class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Search</button>
                </div>
            </form>

            <!-- Data Table -->
            <table id="data-table" class="p-4 items-center w-full mb-8 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">ID Asset</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Assigned Employee</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Brand</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Serial Number</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Active</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Category</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Code</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Type</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">Action</th>
                    </tr>
                </thead>
                <tbody class="justify-center">
                    {{-- {{ dd($assetData) }} --}}
                    @if($assetData !== null)
                        @foreach($assetData as $data)
                            @php
                                $idasset = $data['idasset'] ?? ' ';
                                $assetbrand = $data['assetbrand'] ?? ' ';
                                $assetmodel = $data['assetmodel'] ?? ' ';
                                $assetseries = $data['assetseries'] ?? ' ';
                                $asset = trim($assetbrand . ' ' . $assetmodel . ' ' . $assetseries);

                                $employeeName = $data['employee']['name'] ?? 'Device available at';
                            @endphp

                            <tr>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $idasset }}</p>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">{{ $employeeName }}</p>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-black">{{ $asset }}</span>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-black">{{ $data['assetserialnumber'] ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-black">{{ $data['active'] ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-black">{{ $data['assetcategory'] ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-black">{{ $data['assetcode'] ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-black">{{ $data['assettype'] ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus :ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='{{ route('detailAsset.laptop', ['assetcode' => $data['assetcode'] ?? 'N/A']) }}'">Detail</button>
                                </td>
                                <!-- Example loading indicator -->
                                    <div id="loading-indicator" style="display: none;">Loading...</div>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center p-2 align-middle bg-transparent border-b border-r whitespace-nowrap shadow-transparent">
                                <span class="font-semibold leading-tight text-xs text-black">No data is available</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm">
                        <li>
                            <a href="javascript:void(0);" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-800 ajax-pagination" data-url="{{ $assetData->previousPageUrl() }}">
                                Previous
                            </a>
                        </li>
                    <!-- Pagination Elements -->
                    @foreach ($assetData->links()->elements[0] as $page => $url)
                        @if ($page == $assetData->currentPage())
                            <li>
                                <span class="flex items-center justify-center px-3 h-8 text-gray-700 border border-gray-300 bg-white hover:bg-gray-100 hover:text-white" aria-current="page">
                                    {{ $page }}
                                </span>
                            </li>   
                        @else
                            <li>
                                <a href="javascript:void(0);" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800 ajax-pagination" data-url="{{ $url }}">
                                    {{ $page }} 
                                </a>
                            </li>
                        @endif
                    @endforeach
                    <!-- Next Page Link -->
                    @if ($assetData->hasMorePages())
                        <li>
                            <a href="javascript:void(0);" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-800 ajax-pagination" data-url="{{ $assetData->nextPageUrl() }}">
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
          <div class="flex flex-wrap justify-evenly gap-2 p-2 bg-white">
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">PT. Kereta Api Indonesia</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kereta Api Indonesia</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">PT. KAI Properti</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">KAI Properti</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="D:/laragon/www/KAPMASSETAP1/FEKAPMASSET/public/assets/KAI.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">PT. KCI</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">KCI</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function attachPaginationListeners() {
        const paginationLinks = document.querySelectorAll('.ajax-pagination');

        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');

                const loadingIndicator = document.getElementById('loading-indicator');
                loadingIndicator.style.display = 'block';

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = data;

                        const newTable = tempDiv.querySelector('#data-table');
                        const newPagination = tempDiv.querySelector('nav');

                        // Update the existing table and pagination if they exist
                        if (newTable) {
                            document.getElementById('data-table').innerHTML = newTable.innerHTML;
                        } else {
                            console.error('New table not found in fetched data.');
                        }

                        if (newPagination) {
                            document.querySelector('nav').innerHTML = newPagination.innerHTML;
                        } else {
                            console.error('New pagination not found in fetched data.');
                        }

                        // Update the current page state
                        updateCurrentPageState();

                        // Update the URL in the address bar
                        const pageUrl = new URL(url);
                        window.history.pushState({ page: pageUrl.href }, '', pageUrl.href);
                    })
                    .catch(error => console.error('Error fetching data:', error))
                    .finally(() => {
                        // Hide loading indicator
                        loadingIndicator.style.display = 'none';
                    });
            });
        });
    }

    // Handle back/forward navigation
    window.addEventListener('popstate', function(event) {
        if (event.state) {
            fetch(event.state.page)
                .then(response => response.text())
                .then(data => {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data;

                    const newTable = tempDiv.querySelector('#data-table');
                    const newPagination = tempDiv.querySelector('nav');

                    if (newTable) {
                        document.getElementById('data-table').innerHTML = newTable.innerHTML;
                    } else {
                        console.error('New table not found in fetched data.');
                    }

                    if (newPagination) {
                        document.querySelector('nav').innerHTML = newPagination.innerHTML;
                    } else {
                        console.error('New pagination not found in fetched data.');
                    }

                    // Update the current page state
                    updateCurrentPageState();
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    });

    function updateCurrentPageState() {
        const paginationLinks = document.querySelectorAll('.ajax-pagination');
        const currentPage = document.querySelector('.ajax-pagination.active');
        if (currentPage) {  
            const currentPageNumber = currentPage.textContent.trim(); 
            console.log('Current Page:', currentPageNumber); 
            console.log('Current Page:', currentPage); 

            // Set the active class on the current page link
            const activeLink = Array.from(paginationLinks).find(link => link.textContent.trim() === currentPageNumber);
            if (activeLink) {
                activeLink.classList.add('active');
                activeLink.classList.add('bg-blue-700');
            }
        }
    }

    attachPaginationListeners();
});
</script>
</body>

@endsection             