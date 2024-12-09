@extends('layouts.app')
@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/dist/libs/dropzone/dist/min/dropzone.min.css') }}">

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
    </style>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="createAsset" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="esa-header-dark">Adding {{ $assetcode }} Specification Detail </h2>
        <form id="editForm" action="{{ route('transaction.hardware.laptop.store', ['assetcode' => $assetcode]) }}" method="POST">
            @csrf <!-- CSRF protection -->
            <div class="row mt-4">
                {{-- Field 1 -> 11 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    {{-- show assetcode --}}
                    <div class="mb-4">
                        <label for="assetcodeModal" class="form-label esa-label">Asset Code</label>
                        <input type="text" id="assetcodeModal" class="form-control" name="assetcode" value="{{ $assetcode }}" readonly> <!-- Hidden input for the condition -->
                    </div>
                    
                    {{-- show categoru --}}
                    <div class="mb-4">
                        <label for="assetcategoryModal" class="form-label esa-label">Asset Category</label>
                        <input type="text" id="assetcategoryModal" class="form-control" name="assetcategory" value="{{ $assetcategory }}" readonly> <!-- Hidden input for the condition -->
                    </div>

                    {{-- select processor brand --}}
                    <div class="mb-4">
                        <label for="processorbrand" class="form-label esa-label"> Processor Brand </label>
                        <select id="processorbrand" name="processorbrand" class="form-control">
                            <option value="">Select Processor Brand</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'PROC_BRAND' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select processor model --}}
                    <div class="mb-4">
                        <label for="processormodel" class="form-label esa-label"> Processor Model </label>
                        <select id="processormodel" name="processormodel" class="form-control">
                            <option value="">Select Processor Model</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Processor Model based on selected Processor Brand
                        document.getElementById('processorbrand').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var assetDropdown = document.getElementById('processormodel');
                            var optionData = @json($optionData); // Get the option data from the server-side

                            // Clear existing options
                            assetDropdown.innerHTML = '<option value="">Select Processor Model</option>';

                            // Filter and add options based on selected processor brand and condition = 'PROC_MODEL'
                            optionData.forEach(function(option) {
                                if (option.condition === 'PROC_MODEL' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    assetDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>

                    {{-- select processor series --}}
                    <div class="mb-4">
                        <label for="processorseries" class="form-label esa-label"> Processor Series </label>
                        <select id="processorseries" name="processorseries" class="form-control">
                            <option value="">Select Processor Series</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Processor Series based on selected Processor Model
                        document.getElementById('processormodel').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var assetDropdown = document.getElementById('processorseries');
                            var optionData = @json($optionData); // Get the option data from the server-side

                            // Clear existing options
                            assetDropdown.innerHTML = '<option value="">Select Processor Model</option>';

                            // Filter and add options based on selected Processor Model and condition = 'PROC_SERIES'
                            optionData.forEach(function(option) {
                                if (option.condition === 'PROC_SERIES' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    assetDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>
                    
                    {{-- select memory type --}}
                    <div class="mb-4">
                        <label for="memorytype" class="form-label esa-label"> Memory Type </label>
                        <select id="memorytype" name="memorytype" class="form-control">
                            <option value="">Select Memory Type</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'MEMORY_TYPE' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select memory brand --}}
                    <div class="mb-4">
                        <label for="memorybrand" class="form-label esa-label"> Memory Brand </label>
                        <select id="memorybrand" name="memorybrand" class="form-control">
                            <option value="">Select Memory Brand</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'MEMORY_BRAND' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select memory model --}}
                    <div class="mb-4">
                        <label for="memorymodel" class="form-label esa-label"> Memory Model </label>
                        <select id="memorymodel" name="memorymodel" class="form-control">
                            <option value="">Select Memory Model</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Memory Model based on selected Memory Brand
                        document.getElementById('memorybrand').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var memoryModelDropdown = document.getElementById('memorymodel');
                            var optionData = @json($optionData);
                            
                            // Clear existing options
                            memoryModelDropdown.innerHTML = '<option value="">Select Memory Model</option>';

                            // Filter and add options based on selected Memory Brand and condition = 'MEMORY_MODEL'
                            optionData.forEach(function(option) {
                                if (option.condition === 'MEMORY_MODEL' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    memoryModelDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>

                    {{-- select memory series --}}
                    <div class="mb-4">
                        <label for="memoryseries" class="form-label esa-label"> Memory Series </label>
                        <select id="memoryseries" name="memoryseries" class="form-control">
                            <option value="">Select Memory Series</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Memory Series based on selected Memory Model
                        document.getElementById('memorymodel').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var memorySeriesDropdown = document.getElementById('memoryseries');
                            var optionData = @json($optionData);

                            // Clear existing options
                            memorySeriesDropdown.innerHTML = '<option value="">Select Memory Series</option>';

                            // Filter and add options based on selected Memory Model and condition = 'MEMORY_SERIES'
                            optionData.forEach(function(option) {
                                if (option.condition === 'MEMORY_SERIES' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    memorySeriesDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>

                    {{-- select memory capacity --}}
                    <div class="mb-4">
                        <label for="memorycapacity" class="form-label esa-label"> Memory Capacity </label>
                        <select id="memorycapacity" name="memorycapacity" class="form-control">
                            <option value="">Select Memory Capacity</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'MEMORY_CAPACITY' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select storage type --}}
                    <div class="mb-4">
                        <label for="storagetype" class="form-label esa-label"> Storage Type </label>
                        <select id="storagetype" name="storagetype" class="form-control">
                            <option value="">Select Storage Type</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'STORAGE_TYPE' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- Field 12 -> 22 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    {{-- select storage brand --}}
                    <div class="mb-4">
                        <label for="storagebrand" class="form-label esa-label"> Storage Brand </label>
                        <select id="storagebrand" name="storagebrand" class="form-control">
                            <option value="">Select Storage Brand</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'STORAGE_BRAND' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                
                    {{-- select storage model --}}
                    <div class="mb-4">
                        <label for="storagemodel" class="form-label esa-label"> Storage Model </label>
                        <select id="storagemodel" name="storagemodel" class="form-control">
                            <option value="">Select Storage Model</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Storage Model based on selected Storage Brand
                        document.getElementById('storagebrand').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var storageModelDropdown = document.getElementById('storagemodel');
                            var optionData = @json($optionData);

                            // Clear existing options
                            storageModelDropdown.innerHTML = '<option value="">Select Storage Model</option>';

                            // Filter and add options based on selected Storage Brand and condition = 'STORAGE_MODEL'
                            optionData.forEach(function(option) {
                                if (option.condition === 'STORAGE_MODEL' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    storageModelDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>

                    {{-- select storage capacity --}}
                    <div class="mb-4">
                        <label for="storagecapacity" class="form-label esa-label"> Storage Capacity </label>
                        <select id="storagecapacity" name="storagecapacity" class="form-control">
                            <option value="">Select Storage Capacity</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'STORAGE_CAPACITY' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select graphics type --}}
                    <div class="mb-4">
                        <label for="graphicstypE1" class="form-label esa-label"> First Graphics Type </label>
                        <select id="graphicstypE1" name="graphicstypE1" class="form-control">
                            <option value="">Select First Graphic Type</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'GRAPHIC_TYPE' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select graphics brand --}}
                    <div class="mb-4">
                        <label for="graphicsbranD1" class="form-label esa-label"> First Graphic Brand </label>
                        <select id="graphicsbranD1" name="graphicsbranD1" class="form-control">
                            <option value="">Select First Graphic Brand</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'GRAPHIC_BRAND' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select graphics model --}}
                    <div class="mb-4">
                        <label for="graphicsmodeL1" class="form-label esa-label"> First Graphic Model </label>
                        <select id="graphicsmodeL1" name="graphicsmodeL1" class="form-control">
                            <option value="">Select First Graphic Model</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Graphics Model based on selected Graphics Brand
                        document.getElementById('graphicsbranD1').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var graphicsModelDropdown = document.getElementById('graphicsmodeL1');
                            var optionData = @json($optionData);

                            // Clear existing options
                            graphicsModelDropdown.innerHTML = '<option value="">Select Graphics Model</option>';

                            // Filter and add options based on selected Graphics Brand and condition = 'GRAPHIC_MODEL'
                            optionData.forEach(function(option) {
                                if (option.condition === 'GRAPHIC_MODEL' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    graphicsModelDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>

                    {{-- select graphics series --}}
                    <div class="mb-4">
                        <label for="graphicsserieS1" class="form-label esa-label"> First Graphic Series </label>
                        <select id="graphicsserieS1" name="graphicsserieS1" class="form-control">
                            <option value="">Select First Graphic Series</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Graphics Series based on selected Graphics Model
                        document.getElementById('graphicsmodeL1').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var graphicsSeriesDropdown = document.getElementById('graphicsserieS1');
                            var optionData = @json($optionData);

                            // Clear existing options
                            graphicsSeriesDropdown.innerHTML = '<option value="">Select Graphics Series</option>';

                            // Filter and add options based on selected Graphics Model and condition = 'GRAPHIC_SERIES'
                            optionData.forEach(function(option) {
                                if (option.condition === 'GRAPHIC_SERIES' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    graphicsSeriesDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>

                    {{-- select graphics memory capacity --}}
                    <div class="mb-4">
                        <label for="graphicscapacitY1" class="form-label esa-label"> First Graphic Memory Capacity </label>
                        <select id="graphicscapacitY1" name="graphicscapacitY1" class="form-control">
                            <option value="">Select First Graphic Memory Capacity</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'GRAPHIC_MEMORY_CAPACITY' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select graphics type 2 --}}
                    <div class="mb-4">
                        <label for="graphicstypE2" class="form-label esa-label"> Second Graphic Type </label>
                        <select id="graphicstypE2" name="graphicstypE2" class="form-control">
                            <option value="">Select Second Graphic Type</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'GRAPHIC_TYPE' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select graphics brand 2 --}}
                    <div class="mb-4">
                        <label for="graphicsbranD2" class="form-label esa-label"> Second Graphic Brand </label>
                        <select id="graphicsbranD2" name="graphicsbranD2" class="form-control">
                            <option value="">Select Second Graphic Brand</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'GRAPHIC_BRAND' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select graphics model 2 --}}
                    <div class="mb-4">
                        <label for="graphicsmodeL2" class="form-label esa-label"> Second Graphic Model </label>
                        <select id="graphicsmodeL2" name="graphicsmodeL2" class="form-control">
                            <option value="">Select Second Graphic Model</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Graphics Model 2 based on selected Graphics Brand 2
                        document.getElementById('graphicsbranD2').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var graphicsModelDropdown = document.getElementById('graphicsmodeL2');
                            var optionData = @json($optionData);

                            // Clear existing options
                            graphicsModelDropdown.innerHTML = '<option value="">Select Graphics Model 2</option>';

                            // Filter and add options based on selected Graphics Brand 2 and condition = 'GRAPHIC_MODEL'
                            optionData.forEach(function(option) {
                                if (option.condition === 'GRAPHIC_MODEL' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    graphicsModelDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>
                </div>
                {{-- Field 23 -> 33 --}}
                <div class="col-12 col-lg-4">
                    {{-- select graphics series 2 --}}
                    <div class="mb-4">
                        <label for="graphicsserieS2" class="form-label esa-label"> Second Graphic Series </label>
                        <select id="graphicsserieS2" name="graphicsserieS2" class="form-control">
                            <option value="">Select Second Graphic Series</option>
                        </select>
                    </div>

                    <script>
                        // JavaScript to handle dynamic population of Graphics Series 2 based on selected Graphics Model 2
                        document.getElementById('graphicsmodeL2').addEventListener('change', function() {
                            var selectedvalue = this.value;
                            var graphicsSeriesDropdown = document.getElementById('graphicsserieS2');
                            var optionData = @json($optionData);

                            // Clear existing options
                            graphicsSeriesDropdown.innerHTML = '<option value="">Select Graphics Series 2</option>';

                            // Filter and add options based on selected Graphics Model 2 and condition = 'GRAPHIC_SERIES'
                            optionData.forEach(function(option) {
                                if (option.condition === 'GRAPHIC_SERIES' && option.typegcm === selectedvalue) {
                                    var newOption = document.createElement('option');
                                    newOption.value = option.description;
                                    newOption.text = option.description;
                                    graphicsSeriesDropdown.appendChild(newOption);
                                }
                            });
                        });
                    </script>
                
                    {{-- select graphics memory capacity 2 --}}
                    <div class="mb-4">
                        <label for="graphicscapacitY2" class="form-label esa-label"> Second Graphic Memory Capacity </label>
                        <select id="graphicscapacitY2" name="graphicscapacitY2" class="form-control">
                            <option value="">Select Second Graphic Memory Capacity</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'GRAPHIC_MEMORY_CAPACITY' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                                
                    {{-- select screen resolution --}}
                    <div class="mb-4">
                        <label for="screenresolution" class="form-label esa-label"> Screen Resolution </label>
                        <select id="screenresolution" name="screenresolution" class="form-control">
                            <option value="">Select Screen Resolution</option>
                            @foreach ($optionData as $optionvalue)
                                @if ($optionvalue['condition'] == 'SCREEN_RESOLUTION' )
                                    <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- select touchscreen --}}
                    <div class="mb-4">
                        <label for="touchscreen" class="form-label esa-label">Touchscreen</label>
                        <select id="touchscreen" name="touchscreen" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select backlight keyboard --}}
                    <div class="mb-4">
                        <label for="backlightkeyboard" class="form-label esa-label">Backlight Keyboard</label>
                        <select id="backlightkeyboard" name="backlightkeyboard" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select convertible --}}
                    <div class="mb-4">
                        <label for="convertible" class="form-label esa-label">Convertible</label>
                        <select id="convertible" name="convertible" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select web camera --}}
                    <div class="mb-4">
                        <label for="webcamera" class="form-label esa-label">Web Camera</label>
                        <select id="webcamera" name="webcamera" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select speaker --}}
                    <div class="mb-4">
                        <label for="speaker" class="form-label esa-label">Speaker</label>
                        <select id="speaker" name="speaker" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select microphone --}}
                    <div class="mb-4">
                        <label for="microphone" class="form-label esa-label">Microphone</label>
                        <select id="microphone" name="microphone" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select wifi --}}
                    <div class="mb-4">
                        <label for="wifi" class="form-label esa-label">WiFi</label>
                        <select id="wifi" name="wifi" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>

                    {{-- select bluetooth --}}
                    <div class="mb-4">
                        <label for="bluetooth" class="form-label esa-label">Bluetooth</label>
                        <select id="bluetooth" name="bluetooth" class="form-control">
                            <option value=1>Yes</option>
                            <option value=0>No</option>
                        </select>
                    </div>
                </div>
            </div>


            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="window.location.href='{{ route('transaction.asset.index') }}'" class="btn btn-outline-muted esa-btn-lg">Back to Master</button>
                <button type="submit" class="btn btn-primary esa-btn-lg">Save</button>
            </div>
        </form>        
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