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

    {{-- Breadcrumb --}}
    @include('kepegawaian.time-management.cuti.breadcrumb')
    {{-- End Breadcrumb --}}

    <!-- Header -->
    <div class="card" id="card-info">
        @if (empty($employeeNIPP) || $employeeNIPP === 'N/A')
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bolder" style="font-size: 32px;">
                    This asset is available to assign
                </h1>
            </div>
            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Assign</button>
        </div>
        @else
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bolder" style="font-size: 32px;">
                    {{$employeeNIPP}} {{$employeeName}} {{$employeePosition}}
                </h1>
            </div>
            <button class="btn mb-1 waves-effect waves-light btn-outline-danger esa-btn">Unassign</button>
        </div>
        @endif
    </div>

    <div class="py-3">
        <div class="esa-header">
            <div class="esa-header-dark">Detail Asset</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" >
            <div class="card" style="background:none">
                <div class="card-body">
                    <!-- Data Pegawai -->
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="esa-title">General Information and Hardware</h4>
                        </div>
                        <div>
                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Print QR</button>
                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Update Hardware</button>
                        </div>
                    </div>
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
                {{-- <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('transaction.edit',[
                    'assetcategory' => $assetcategory, 
                    'assetcode' => $assetcode,
                    'idassetspec' => $idassetspec
                    ])}}'">
                    Update Asset
                </button> --}}

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <!-- Table Head in the First Column -->
                            <tr class="bg-white hidden" hidden>
                                <th scope="row" class="px-6 py-4 font-medium text-b lack whitespace-nowrap ">Asset ID:</th>
                                <td class="px-6 py-4">: {{$idassetspec}}</td>    
                                @if (!empty($assetSpecData))
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">First Graphics Card Type</th>
                                <td class="px-6 py-4">: {{$graphicstype1}}</td>
                                @endif
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Type:</th>
                                <td class="px-6 py-4">: {{$assettype}}</td>
                                @if (!empty($assetSpecData))
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">First Graphics Card</th>
                                <td class="px-6 py-4">: {{$graphics1}}</td>
                                @endif
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device Type:</th>
                                <td class="px-6 py-4">: {{$assetcategory}}</td>
                                @if (!empty($assetSpecData))
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Second Graphics Card Type</th>
                                <td class="px-6 py-4">: {{$graphicstype2}}</td>
                                @endif
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Code:</th>
                                <td class="px-6 py-4">: {{$assetcode}}</td>
                                @if (!empty($assetSpecData))
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Second Graphics Card</th>
                                <td class="px-6 py-4">: {{$graphics2}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device:</th>
                                <td class="px-6 py-4">: {{$assetbms}}</td>
                                @if (!empty($assetSpecData))
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Screen Resolution</th>
                                <td class="px-6 py-4">: {{$screenresolution}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset SerialNumber:</th>
                                <td class="px-6 py-4">: {{$assetserialnumber}}</td>
                                @if (!empty($assetSpecData))
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Touchscreen</th>
                                <td class="px-6 py-4">: @if($touchscreen == 'true') yes @else no @endif</td>
                                @endif
                            </tr>
                            @if (!empty($assetSpecData))
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Processor:</th>
                                <td class="px-6 py-4">: {{$processor}}</td>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Backlight Keyboard</th>
                                <td class="px-6 py-4">: @if($backlightkeyboard == 'true') yes @else no @endif</td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory:</th>
                                <td class="px-6 py-4">: {{$memory}}</td>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Convertible</th>
                                <td class="px-6 py-4">: @if($convertible == 'true') yes @else no @endif</td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage:</th>
                                <td class="px-6 py-4">: {{$storage}}</td>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Web Camera</th>
                                <td class="px-6 py-4">: @if($webcamera == 'true') yes @else no @endif</td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Speaker</th>
                                <td class="px-6 py-4">: @if($speaker == 'true') yes @else no @endif</td>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Wifi</th>
                                <td class="px-6 py-4">: @if($wifi == 'true') yes @else no @endif</td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Microphone</th>
                                <td class="px-6 py-4">: @if($microphone == 'true') yes @else no @endif</td>
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Bluetooth</th>
                                <td class="px-6 py-4">: @if($bluetooth == 'true') yes @else no @endif</td>
                            </tr>
                            @endif
                            <!-- Add more rows as necessary -->
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="esa-header">
            <div class="esa-header-dark">Software</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" >
            <div class="card" style="background:none">
                <div class="card-body">
                    <!-- Data Pegawai -->
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="esa-title">Software Installed</h4>
                        </div>
                        <div>
                            <a href="{{ route('transaction.software.index', ['assetcode' => $assetcode]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                                Add Software
                            </a>
                        </div>
                    </div>

                {{-- <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('transaction.edit',[
                    'assetcategory' => $assetcategory, 
                    'assetcode' => $assetcode,
                    'idassetspec' => $idassetspec
                    ])}}'">
                    Update Asset
                </button> --}}

                <div class="card-datatable table-responsive">
                    <table id="software" class="table table-striped display nowrap esa-table-light">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>ID</th>
                                <th>Kode Aset</th>
                                <th>Tipe</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Lisensi</th>
                                <th>Aktif</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody id="table-master">
                            @if(empty($detailSoftwareData))
                                    <tr>
                                        <td colspan="7" class="text-center"><h5>No data for this table</h5></td>
                                    </tr>
                            @else
                            @foreach($detailSoftwareData as $software)
                            <tr>
                                <td>{{ $software['idassetsoftware'] }}</td>
                                <td>{{  $software['assetcode'] }}</td>
                                <td>{{  $software['softwaretype'] }}</td>
                                <td>{{  $software['softwarecategory'] }}</td>
                                <td>{{  $software['softwarename'] }}</td>
                                <td>{{  $software['softwarelicense'] }}</td>
                                <td>{{  $software['active'] }}</td>
                                <td class="action-buttons">
                                    <button class="btn mb-1 waves-effect waves-light btn-outline-danger esa-btn">Delete</button>
                                    <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="height:36px" onclick="openEditModal({{ json_encode($software) }})">Update</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="esa-header">
            <div class="esa-header-dark">Image</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" >
            <div class="card" style="background:none">
                <div class="card-body">
                    <!-- Data Pegawai -->
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="esa-title">Asset Image</h4>
                        </div>
                        <div>
                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Add Image</button>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive">
                        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-3 g-3 p-3">
                            {{-- card 1 --}}
                            @if(!empty($imgData) && is_array($imgData)) <!-- Check if $imgData is not empty and is an array -->
                                @foreach ($imgData as $img)
                            <div class="col">
                                <div class="card mb-2" style="cursor: pointer; display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                                        <div class="row g-5">
                                            <div class="col-sm-4 d-none d-sm-block text-center">
                                                <button onclick="openImgModal({{ json_encode($img) }})">
                                                    <img class="h-auto max-w-full rounded-lg" src="{{ $img['assetpic'] }}" alt="Asset Image">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <p class="font-semibold leading-tight text-xl border-gray-300 mb-2">No images available</p> <!-- Display Condition -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- First Column (8/12) -->
        <div class="col-md-8">
            <div class="card" style="background:none">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="esa-title">Maintenance History</h4>
                        </div>
                        <div>
                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Add History</button>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive">
                        <table id="software" class="table table-striped display nowrap esa-table-light">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Aset</th>
                                    <th>Suku Cadang</th>
                                    <th>Catatan Perbaikan</th>
                                    <th>Hasil Perbaikan</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody id="table-master">
                                @if(empty($historyMaintenanceData))
                                    <tr>
                                        <td colspan="7" class="text-center"><h5>No data for this table</h5></td>
                                    </tr>
                                @else
                                    @foreach($historyMaintenanceData as $maintenance)
                                        <tr>
                                            <td>{{ $maintenance['maintenanceid'] }}</td>
                                            <td>{{ $maintenance['assetcode'] }}</td>
                                            <td>{{ $maintenance['notessparepart'] }}</td>
                                            <td>{{ $maintenance['notesaction'] }}</td>
                                            <td>{{ $maintenance['notesresult'] }}</td>
                                            <td>{{ $maintenance['dateadded'] }}</td>
                                            <td>{{ $maintenance['picadded'] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Column (4/12) -->
        <div class="col-md-4">
            <div class="card" style="background:none">
                <div class="card-body">
                    @if(empty($histData))
                        <h4 class="esa-title">Asset History</h4>
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-900"> No data available</h3>
                    @else
                    <h4 class="esa-title">Asset History</h4>
                    <ol class="timeline">
                        @foreach ($histData as $data)
                        <li class="timeline-item mb-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                </div>
                                <div>
                                    <time class="text-muted d-block mb-1">{{ $data['dateadded'] }}</time>
                                    <p class="text-muted mb-2 fw-bold">{{ $data['assetcode'] }}</p>
                                    @if(isset($data['nipp']) && !empty($data['nipp']))
                                        <h5 class="fw-bold">Asset has been assigned to</h5>
                                        <p class="fw-bold">{{ $data['employee']['name'] }}</p>
                                    @else
                                        <h5 class="fw-bold">Unassigned Asset</h5>
                                        <p class="fw-bold">Asset returned to IT</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

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
            </script>


@endsection

