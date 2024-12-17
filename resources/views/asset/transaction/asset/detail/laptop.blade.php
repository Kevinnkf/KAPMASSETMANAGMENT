@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/dist/libs/dropzone/dist/min/dropzone.min.css') }}">

    <style>
        .timeline {
        border-left: 1px solid hsl(0, 0%, 0%);
        position: relative;
        list-style: none;
        }

        .timeline .timeline-item {
        position: relative;
        }

        .timeline .timeline-item:after {
        position: absolute;
        display: block;
        top: 0;
        }

        .timeline .timeline-item:after {
        background-color: hsl(0, 0%, 0%);
        left: -38px;
        border-radius: 50%;
        height: 11px;
        width: 11px;
        content: "";
        }

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

        .esa-title {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            letter-spacing: -0.017em;
            color: #0B56A7;
        }

        .esa-danger {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            letter-spacing: -0.017em;
            color: red;
        }

        .esa-label {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            letter-spacing: -0.006em;
            color: #202020;
        }

        .esa-sub-label {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 12px;
            color: #202020;
        }

        .esa-sub2-label {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 10px;
            line-height: 12px;
            letter-spacing: 0.1em;
            color: #818181;
        }
    </style>

    <style>
        .esa-btn-lg {
            font-weight: 600;
            font-size: 14px;
            line-height: 16px;
            letter-spacing: -0.006em;
            height: 40px;
        }
        .esa-btn {
            font-weight: 600;
            font-size: 12px;
            line-height: 16px;
            height: 36px;
        }
        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: #0b56a7;
            --bs-btn-border-color: #0b56a7;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #3472B6;
            --bs-btn-hover-border-color: #3472B6;
            --bs-btn-focus-shadow-rgb: 117, 153, 255;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #09488b;
            --bs-btn-active-border-color: #09488b;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #E3E3E3;
            --bs-btn-disabled-border-color: #E3E3E3;
        }
        .btn-outline-primary {
            --bs-btn-color: #0B56A7;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #0B56A7;
            --bs-btn-hover-color: #202020;
            --bs-btn-hover-bg: #ffffff;
            --bs-btn-hover-border-color: #0B56A7;
            --bs-btn-focus-shadow-rgb: 93, 135, 255;
            --bs-btn-active-color: #202020;
            --bs-btn-active-bg: #f7f7f7;
            --bs-btn-active-border-color: #0B56A7;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #0B56A7;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #0B56A7;
            --bs-gradient: none;
        }
        .btn-outline-danger {
            --bs-btn-color: #E6251C;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #E6251C;
            --bs-btn-hover-color: #202020;
            --bs-btn-hover-bg: #ffffff;
            --bs-btn-hover-border-color: #E6251C;
            --bs-btn-focus-shadow-rgb: 250, 137, 107;
            --bs-btn-active-color: #202020;
            --bs-btn-active-bg: #F7F7F7;
            --bs-btn-active-border-color: #E6251C;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #E6251C;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #E6251C;
            --bs-gradient: none;
        }
        .btn-outline-muted {
            --bs-btn-color: #202020;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #C8C8C8;
            --bs-btn-hover-color: #202020;
            --bs-btn-hover-bg: #ffffff;
            --bs-btn-hover-border-color: #C8C8C8;
            --bs-btn-focus-shadow-rgb: 93, 135, 255;
            --bs-btn-active-color: #202020;
            --bs-btn-active-bg: #f7f7f7;
            --bs-btn-active-border-color: #C8C8C8;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #C8C8C8;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #C8C8C8;
            --bs-gradient: none;
        }
    </style>

    <style>
        .form-select {
            color: #202020;
            --bs-form-select-bg-img: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%230b56a7' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        @media (max-width: 1024px) {
        }

        @media (max-width: 860px) {
        }

        @media (max-width: 415px) {
            .esa-header {
                display: block;
                justify-content: space-between;
            }
            .esa-header-dark {
                font-size: 24px;
            }
            .esa-subheader-dark-grey {
                font-size: 14px;
            }
        }
    </style>

    <style>

        .dz-esa {
            position: relative;
            display: flex;           /* Enable flexbox */
            flex-direction: column;  /* Stack children vertically */
            align-items: center;     /* Horizontally center items */
            justify-content: center; /* Vertically center items */
            min-height: 100px;
            width: 100%;
        }

        .dz-message {
            display: flex;
            flex-direction: column;
            align-items: center;
            width:100%;
        }

        /* Optional: Hide default Dropzone input (browse button) */
        .dz-hidden-input {
            display: none !important;
        }

        /* Base Styles for Dropzone Preview */
        .dz-preview {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f0f0f0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            position: relative;
        }

        .dz-details {
            display: flex;
            flex-direction: column;
            margin-right: 15px;
        }

        .dz-filename {
            font-weight: bold;
        }

        .dz-size {
            font-size: 0.9rem;
            color: #666;
        }

        /* Progress Bar */
        .dz-progress {
            width: 100%;
            height: 4px;
            background: #42B243;
            border-radius: 4px;
            overflow: hidden;
        }

        .dz-upload {
            height: 100%;
            /* background-color: #F9F9F9; */
            background-color: red;
            width: 0%;
            transition: width 0.3s ease;
        }

        /* Custom Styling for Processing State */
        /* .dz-processing {
            background-color: #fffbe6;
            border-color: #f7c948;
        } */

        /* Custom Styling for Error State */
        /* .dz-error {
            background-color: #ffe0e0;
            border-color: #ff5f5f;
        } */

        /* Custom Styling for Completed Upload */
        /* .dz-complete {
            background-color: #e0ffe0;
            border-color: #5fcc5f;
        } */

        /* Error Message */
        .dz-error-message {
            color: #ff4d4d;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .dz-success-message {
            color: #42B243;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* Remove Button */
        /* .dz-remove {
            background: #ff3d3d;
            border: none;
            padding: 5px 10px;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        } */

        /* Completed File Icon */
        /* .dz-complete::before {
            content: '✔';
            font-size: 1.5rem;
            color: #5fcc5f;
            position: absolute;
            right: 10px;
        } */

        #card-info {
            padding: 32px 40px;
            border-radius: 12px;
            margin-bottom: 16px;
            box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.08);
        }
        .line {
            position: relative;
            width: 2px; /* Width of the line */
            background-color: black; /* Color of the line */
            flex-grow: 1;
            z-index: -1; /* Ensure the line is behind the circles */
        }
    </style>

@endsection

@section('content')

    <?php
    // Sesuaikan timezone dengan lokasi
    date_default_timezone_set('Asia/Jakarta');
    ?>

    @php
    // Asset Information
    $assetbrand = isset($assetData['assetbrand']) ? $assetData['assetbrand'] : 'N/A';
    $assetmodel = isset($assetData['assetmodel']) ? $assetData['assetmodel'] : 'N/A';
    $assetseries = isset($assetData['assetseries']) ? $assetData['assetseries'] : 'N/A';
    $assetbms = $assetbrand . ' ' . $assetmodel . ' ' . $assetseries;
    $assettype = isset($assetData['assettype']) ? $assetData['assettype'] : 'N/A';
    $assetcategory = isset($assetData['assetcategory']) ? $assetData['assetcategory'] : 'N/A';
    $assetcode = isset($assetData['assetcode']) ? $assetData['assetcode'] : 'N/A';
    $assetserialnumber = isset($assetData['assetserialnumber']) ? $assetData['assetserialnumber'] : 'N/A';

    // Employee Information
    $employeeNIPP = isset($assetData['employee']['nipp']) ? $assetData['employee']['nipp'] : 'N/A';
    $employeeName = isset($assetData['employee']['name']) ? $assetData['employee']['name'] : 'N/A';
    $employeePosition = isset($assetData['employee']['position']) ? $assetData['employee']['position'] : 'N/A';
    $employeeUnit = isset($assetData['employee']['unit']) ? $assetData['employee']['unit'] : 'N/A';
    $employeeDepartment = isset($assetData['employee']['department']) ? $assetData['employee']['department'] : 'N/A';
    $employeeDirectorate = isset($assetData['employee']['directorate']) ? $assetData['employee']['directorate'] : 'N/A';
    $employeeActive = isset($assetData['employee']['active']) ? $assetData['employee']['active'] : 'N/A';

    @endphp 

@if (!empty($assetSpecData))
@foreach ($assetSpecData as $assetspecs)
    @php
    $idassetspec = $assetspecs['idassetspec'] ?? '0';
    $processorbrand = isset($assetspecs['processorbrand']) ? $assetspecs['processorbrand'] : 'N/A';
    $processormodel = isset($assetspecs['processormodel']) ? $assetspecs['processormodel'] : 'N/A';
    $processorseries = isset($assetspecs['processorseries']) ? $assetspecs['processorseries'] : 'N/A';
    $processor = $processorbrand . ' ' . $processormodel . ' ' . $processorseries;
    $memorytype = isset($assetspecs['memorytype']) ? $assetspecs['memorytype'] : 'N/A';
    $memorybrand = isset($assetspecs['memorybrand']) ? $assetspecs['memorybrand'] : 'N/A';
    $memorymodel = isset($assetspecs['memorymodel']) ? $assetspecs['memorymodel'] : 'N/A';
    $memoryseries = isset($assetspecs['memoryseries']) ? $assetspecs['memoryseries'] : 'N/A';
    $memorycapacity = isset($assetspecs['memorycapacity']) ? $assetspecs['memorycapacity'] : 'N/A';
    $memory = $memorytype . ' ' . $memorybrand . ' ' . $memorymodel . ' ' . $memoryseries . ' ' . $memorycapacity . ' GB';
    $storagetype = isset($assetspecs['storagetype']) ? $assetspecs['storagetype'] : 'N/A';
    $storagebrand = isset($assetspecs['storagebrand']) ? $assetspecs['storagebrand'] : 'N/A';
    $storagemodel = isset($assetspecs['storagemodel']) ? $assetspecs['storagemodel'] : 'N/A';
    $storagecapacity = isset($assetspecs['storagecapacity']) ? $assetspecs['storagecapacity'] : 'N/A';
    $storage = $storagetype . ' ' . $storagebrand . ' ' . $storagemodel . ' ' . $storagecapacity . ' GB';
    $graphicsbrand1 = isset($assetspecs['graphicsbranD1']) ? $assetspecs['graphicsbranD1'] : 'N/A';
    $graphicsmodel1 = isset($assetspecs['graphicsmodeL1']) ? $assetspecs['graphicsmodeL1'] : 'N/A';
    $graphicsseries1 = isset($assetspecs['graphicsserieS1']) ? $assetspecs['graphicsserieS1'] : 'N/A';
    $graphicscapacity1 = isset($assetspecs['graphicscapacitY1']) ? $assetspecs['graphicscapacitY1'] : 'N/A';
    $graphics1 = $graphicsbrand1 . ' ' . $graphicsmodel1 . ' ' . $graphicsseries1 . ' ' . $graphicscapacity1 . ' GB';
    $graphicstype1 = isset($assetspecs['graphicstypE1']) ? $assetspecs['graphicstypE1'] : 'N/A';

    $graphicsbrand2 = isset($assetspecs['graphicsbranD2']) ? $assetspecs['graphicsbranD2'] : 'N/A';
    $graphicsmodel2 = isset($assetspecs['graphicsmodeL2']) ? $assetspecs['graphicsmodeL2'] : 'N/A';
    $graphicsseries2 = isset($assetspecs['graphicsserieS2']) ? $assetspecs['graphicsserieS2'] : 'N/A';
    $graphicscapacity2 = isset($assetspecs['graphicscapacitY2']) ? $assetspecs['graphicscapacitY2'] : 'N/A';
    $graphics2 = $graphicsbrand2 . ' ' . $graphicsmodel2 . ' ' . $graphicsseries2 . ' ' . $graphicscapacity2 . ' GB';
    $graphicstype2 = isset($assetspecs['graphicstypE2']) ? $assetspecs['graphicstypE2'] : 'N/A';

    $screenresolution = isset($assetspecs['screenresolution']) ? $assetspecs['screenresolution'] : 'N/A';
    $touchscreen = isset($assetspecs['touchscreen']) ? $assetspecs['touchscreen'] : 'N/A';
    $backlightkeyboard = isset($assetspecs['backlightkeyboard']) ? $assetspecs['backlightkeyboard'] : 'N/A';
    $convertible = isset($assetspecs['convertible']) ? $assetspecs['convertible'] : 'N/A';
    $webcamera = isset($assetspecs['webcamera']) ? $assetspecs['webcamera'] : 'N/A';
    $speaker = isset($assetspecs['speaker']) ? $assetspecs['speaker'] : 'N/A';
    $microphone = isset($assetspecs['microphone']) ? $assetspecs['microphone'] : 'N/A';
    $wifi = isset($assetspecs['wifi']) ? $assetspecs['wifi'] : 'N/A';
    $bluetooth = isset($assetspecs['bluetooth']) ? $assetspecs['bluetooth'] : 'N/A';
@endphp
@endforeach
@else
    @php $idassetspec = 0  @endphp
@endif

    {{-- Breadcrumb --}}
    @include('kepegawaian.time-management.cuti.breadcrumb')
    {{-- End Breadcrumb --}}

    <!-- Header -->
    <div class="card" id="card-info">
        @if (empty($employeeNIPP) || $employeeNIPP === 'N/A')
        <div class="card-body d-flex justify-content-between align-items-center" style="margin-right: 0">
            <div>
                <h1 class="fw-bolder" style="font-size: 32px;">
                    This asset is available to assign
                </h1>
            </div>
            @if (session('success'))
                        <h3 class="text-success">{{ session('success') }}</h3>
            @endif
        <a href="#nippModal" 
            data-bs-toggle="modal" 
            class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" 
            onclick="openNippModal()">
            Assign Asset
        </a>
        </div>
        @else
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bolder" style="font-size: 32px;">
                    {{$employeeNIPP}} {{$employeeName}} {{$employeePosition}}
                </h1>
            </div>
            <div>
                <button class="btn mb-1 waves-effect waves-light btn-rounded btn-danger esa-btn" style="width: 100px;"
                onclick="confirmUnassignAsset('{{ route('transaction.asset.unassign', ['assetcode' => $assetcode]) }}')"> 
                Unassign
                </button>
                <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="width: 100px;" 
                        onclick="window.location.href='{{ route('transaction.asset.print', ['assetcode' => $assetcode]) }}'">
                        Print BAST
                </button>
            </div>
        </button>
        </div>
        @endif
    </div>

    @include('asset.transaction.asset.detail.hardware.index')

    @include('asset.transaction.asset.detail.software.index')
    
    @include('asset.transaction.asset.detail.image.index')
    
    @include('asset.transaction.asset.detail.maintenance.index')

    {{-- Assign Modal --}}
    <div id="nippModal" class="modal hidden">
        <div class="modal-dialog modal-l modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4 pb-2">
                    <h5 class="esa-title fs-5 text-primary-kai fw-bolder" id="nippModal">Assign Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content">
                    <div class="row justify-center m-2">
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <form id="updateNippForm" method="POST">
                                        @csrf
                                        @method('PUT')  
                                        <div class="col-md-12">
                                            <label for="name" class="form-label esa-label">Name</label>
                                            <select id="name" name="name" class="form-select" required>
                                                <option value="" disabled selected>Name</option>
                                                @foreach ($employeeData as $employee)
                                                    <option value="{{ $employee['data'] }}"> {{ $employee['data'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Input field for NIPP -->
                                        <div class="col-md-12">
                                            <label for="nipp" class="form-label esa-label">Nipp</label>
                                            <input type="text" id="nipp" name="nipp" class="form-control" placeholder="Nipp" readonly>
                                        </div>
                                        <!-- Employee Information Fields -->
                                        <div class="col-md-12 mt-3">
                                            <label for="position" class="form-label esa-label">Position</label>
                                            <input type="text" id="position" name="position" class="form-control" placeholder="Position" readonly>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="unit" class="form-label esa-label">Unit</label>
                                            <input type="text" id="unit" name="unit" class="form-control" placeholder="Unit" readonly>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="department" class="form-label esa-label">Department</label>
                                            <input type="text" id="department" name="department" class="form-control" placeholder="Department" readonly>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="directorate" class="form-label esa-label">Directorate</label>
                                            <input type="text" id="directorate" name="directorate" class="form-control" placeholder="Directorate" readonly>
                                        </div>

                                        <script>
                                            document.getElementById('name').addEventListener('change', function() {
                                                var selectedName = this.value; // Get the selected NIPP value
                                                var employeeData = @json($employeeData); // Parse PHP data into JavaScript object

                                                // Find the selected employee's data
                                                var selectedEmployee = employeeData.find(employee => employee.name === selectedName);
                                            
                                                // Populate the form fields with selected employee data or default to 'N/A'
                                                if (selectedEmployee) {
                                                    document.getElementById('nipp').value = selectedEmployee.nipp || 'N/A';
                                                    document.getElementById('position').value = selectedEmployee.position || 'N/A';
                                                    document.getElementById('unit').value = selectedEmployee.unit || 'N/A';
                                                    document.getElementById('department').value = selectedEmployee.department || 'N/A';
                                                    document.getElementById('directorate').value = selectedEmployee.directorate || 'N/A';
                                                } else {
                                                    document.getElementById('nipp').value = 'N/A';
                                                    document.getElementById('position').value = 'N/A';
                                                    document.getElementById('unit').value = 'N/A';
                                                    document.getElementById('department').value = 'N/A';
                                                    document.getElementById('directorate').value = 'N/A';
                                                }
                                            });
                                        </script>
                                            
                                        </script>
                                        <!-- Buttons -->
                                        <div class="mt-3">
                                            {{-- <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button> --}}
                                            <button type="submit" class="btn btn-primary esa-btn-lg rounded">Assign</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function openNippModal() {


    // Set the form action dynamically
    var assetcode = "{{ $assetcode }}"; // Get the assetcode from Blade{!! json_encode($assetcode) !!}
    document.getElementById('updateNippForm').action = `{{ route('transaction.asset.assign', ':assetcode') }}`.replace(':assetcode', assetcode);

    console.log(document.getElementById('updateNippForm').action);
}

function confirmUnassignAsset(url) {
    // Show SweetAlert confirmation dialog
    Swal.fire({
        icon: 'error',
        title: 'Are you sure?',
        text: "You won't be able to revert this!",

        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, unassign it!',
        showCancelButton: true,
        cancelButtonTextColor: '#fffff',
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, call the unassignAsset function
            unassignAsset(url);
        }
    });
}

function unassignAsset(url) {
    fetch(url, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            location.reload(); // Optional: reload page or redirect if needed
        } else {
            location.reload(); // Optional: reload page or redirect if needed
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>

@endsection

@section('scripts')

            <script src="{{ asset('assets/dist/libs/dropzone/dist/min/dropzone.min.js') }}"></script>

            <script>
                (function () {
                    'use strict'

                    // Ambil semua form dengan class 'needs-validation'
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop semua form dan prevent jika tidak valid
                    Array.prototype.slice.call(forms)
                        .forEach(function (form) {
                            form.addEventListener('submit', function (event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                }

                                form.classList.add('was-validated')
                            }, false)
                        })
                })()
            </script>

            <script>
                $(document).ready(function() {

                    // Initialize Dropzone
                     Dropzone.autoDiscover = false;

                    // Helper function to format file size as desired
                    function formatFileSize(sizeInBytes) {
                        var units = ['B', 'KB', 'MB', 'GB', 'TB'];
                        var unitIndex = 0;
                        var size = sizeInBytes;

                        // Convert to the appropriate size unit
                        while (size >= 1024 && unitIndex < units.length - 1) {
                            size /= 1024;
                            unitIndex++;
                        }

                        // Format to 2 decimal places
                        return size.toFixed(2) + units[unitIndex];
                    }

                    var myDropzone = new Dropzone("#file-dropzone", {
                        url: "{{ route('submit-cuti') }}", // Set this to your upload route
                        paramName: "file", // Name of the input for the file
                        maxFilesize: 10, // Max file size in MB
                        acceptedFiles: ".pdf,.doc,.docx,.jpg,.jpeg,.png", // Allowed file types
                        autoProcessQueue: true, // Automatically upload the file
                        previewTemplate: document.querySelector('#dz-template').innerHTML, // Use custom template
                        filesizeBase: 1024, // Define the file size base (1 KB = 1024 bytes)
                        init: function() {
                            this.on("addedfile", function(file) {
                                // Update the file size text with custom formatted text
                                var sizeElement = file.previewElement.querySelector("[data-dz-size]");
                                var formattedSize = formatFileSize(file.size); // Format size
                                sizeElement.textContent = "Ukuran - " + formattedSize; // Custom size display
                            });

                            this.on("uploadprogress", function(file, progress) {
                                file.previewElement.querySelector(".dz-upload").style.width = progress + "%";
                            });

                            this.on("success", function(file) {
                                console.log('File uploaded successfully');
                                var successMessage = "Berhasil mengunggah";
                                var successElement = file.previewElement.querySelector(".dz-success-message");

                                if (!successElement) {
                                    successElement = document.createElement("div");
                                    successElement.className = "dz-success-message";
                                    successElement.innerHTML = `<span>${successMessage}</span>`;
                                    file.previewElement.appendChild(successElement);
                                } else {
                                    successElement.querySelector("span").textContent = successMessage;
                                }

                                file.previewElement.classList.add("dz-complete");
                            });

                            this.on("error", function(file, response) {
                                console.log('Upload failed');
                                var errorMessage = "Gagal mengunggah";
                                var errorElement = file.previewElement.querySelector(".dz-error-message");

                                if (!errorElement) {
                                    errorElement = document.createElement("div");
                                    errorElement.className = "dz-error-message";
                                    errorElement.innerHTML = `<span>${errorMessage}</span>`;
                                    file.previewElement.appendChild(errorElement);
                                } else {
                                    errorElement.querySelector("span").textContent = errorMessage;
                                }

                                file.previewElement.classList.add("dz-error");
                            });

                            this.on("removedfile", function(file) {
                                console.log('File removed');
                            });
                        }
                    });

                   

                    hitungLamaCuti();
                });


                function hapusLampiran() {
                    console.log('hapus');
                }

                function editLampiran() {
                    console.log('edit');
                }

                function refreshLampiran() {
                    console.log('refresh');
                }

                function hitungLamaCuti() {
                    var tanggal1 = $('#tanggal_mulai').val();
                    var tanggal2 = $('#tanggal_akhir').val();

                    // Mengonversi tanggal ke objek Date
                    const awal = new Date(tanggal1);
                    const akhir = new Date(tanggal2);

                    // Menghitung selisih dalam milidetik
                    const selisih = akhir - awal;

                    // Menghitung jumlah hari
                    const lamaHari = selisih / (1000 * 60 * 60 * 24);

                    if(Math.floor(lamaHari) && awal<akhir) {
                        $('#lama_cuti').show();
                        $('#lama_hari').html(Math.floor(lamaHari)+' hari');
                    } else {
                        $('#lama_cuti').hide();
                    }

                }

                function openAndDownloadPDF(url) {
                // Open the PDF in a new tab
                const printWindow = window.open(url, '_blank');

                // Wait for the PDF to load and then trigger the print dialog
                printWindow.onload = function() {
                    printWindow.print();

                    // Trigger the download after a short delay
                    setTimeout(() => {
                        const link = document.createElement('a');
                        link.href = url;
                        link.download = 'Label QRCode.pdf';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }, 1000); // Adjust the delay as necessary
                };
            }
            </script>


@endsection

