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
        <h2 class="text-xl font-bold mb-4">Add new asset here</h2>
        <form id="editForm" action="{{ route('transaction.asset.store') }}" method="POST">
            @csrf <!-- CSRF protection -->
            <div class="mb-4">
                <div class="mb-4">
                    <label for="assettype" class="form-label esa-label">Asset Type</label>
                    <select id="assettype" name="assettype" class="form-control" @error('assettype') is-invalid @enderror>
                        <option value="">Select Type</option>
                        @foreach ($optionData as $optionvalue)
                            @if ($optionvalue['condition'] == 'ASSET_TYPE')
                                <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('assettype')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="assetcategory" class="form-label esa-label">Asset Category</label>
                    <select id="assetcategory" name="assetcategory" class="form-control" @error('assetcategory') is-invalid @enderror>
                        <option value="">Select Category</option>
                    </select>
                    @error('assetcategory')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="assetbrand" class="form-label esa-label">Asset Brand</label>
                    <select id="assetbrand" name="assetbrand" class="form-control" @error('assetbrand') is-invalid @enderror>
                        <option value="">Select Brand</option>
                        @foreach ($optionData as $optionvalue)
                            @if ($optionvalue['condition'] == 'ASSET_BRAND')
                                <option value="{{ $optionvalue['description'] }}">{{ $optionvalue['description'] }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('assetbrand')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="assetmodel" class="form-label esa-label">Asset Model</label>
                    <select id="assetmodel" name="assetmodel" class="form-control" @error('assetmodel') is-invalid @enderror>
                        <option value="">Select Model</option>
                    </select>
                    @error('assetmodel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="assetseries" class="form-label esa-label">Asset Series</label>
                    <select id="assetseries" name="assetseries" class="form-control" @error('assetseries') is-invalid @enderror>
                        <option value="">Select Series</option>
                    </select>
                    @error('assetseries')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="assetserialnumber" class="form-label esa-label">Serial Number</label>
                    <input type="text" id="assetserialnumber" name="assetserialnumber" class="w-full p-2 border rounded @error('assetserialnumber') is-invalid @enderror" required>
                    @error('assetserialnumber')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="picadded" class="form-label esa-label">PIC Added</label>
                    <select id="picadded" name="picadded" class="form-control" @error('picadded') is-invalid @enderror>
                        <option value="">Select PIC</option>
                        <option value="TOMMY WISNU WARDHANA">TOMMY WISNU WARDHANA</option>
                        <option value="MUHAMAD FAUZAN">MUHAMAD FAUZAN</option>
                    </select>
                    @error('picadded')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

        
            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="window.location.href='{{ route('transaction.asset.index') }}'" class="btn btn-outline-muted esa-btn-lg">Back to Master</button>
                <button type="submit" class="btn btn-primary esa-btn-lg">Save</button>
            </div>
        </form>        
    </div>
</div>
<script>
    // JavaScript to handle dynamic population of Asset Model based on selected Asset Brand
    document.getElementById('assetbrand').addEventListener('change', function() {
        var selectedvalue = this.value;
        var assetDropdown = document.getElementById('assetmodel');
        var optionData = @json($optionData); // Get the option data from the server-side

        // Clear existing options
        assetDropdown.innerHTML = '<option value="">Select Model</option>';

        // Filter and add options based on selected Asset Type and condition = 'ASSET_CATEGORY'
        optionData.forEach(function(option) {
            if (option.condition === 'ASSET_MODEL' && option.typegcm === selectedvalue) {
                var newOption = document.createElement('option');
                newOption.value = option.description;
                newOption.text = option.description;
                assetDropdown.appendChild(newOption);
            }
        });
    });

    // JavaScript to handle dynamic population of Asset Model based on selected Asset Brand
    document.getElementById('assetmodel').addEventListener('change', function() {
        var selectedvalue = this.value;
        var assetDropdown = document.getElementById('assetseries');
        var optionData = @json($optionData); // Get the option data from the server-side

        // Clear existing options
        assetDropdown.innerHTML = '<option value="">Select Series</option>';

        // Filter and add options based on selected Asset Type and condition = 'ASSET_CATEGORY'
        optionData.forEach(function(option) {
            if (option.condition === 'ASSET_SERIES' && option.typegcm === selectedvalue) {
                var newOption = document.createElement('option');
                newOption.value = option.description;
                newOption.text = option.description;
                assetDropdown.appendChild(newOption);
            }
        });
    });

    // JavaScript to handle dynamic population of Asset Category based on selected Asset Type
    document.getElementById('assettype').addEventListener('change', function() {
        var selectedType = this.value;
        var assetCategoryDropdown = document.getElementById('assetcategory');
        var optionData = @json($optionData); // Get the option data from the server-side

        // Clear existing options
        assetCategoryDropdown.innerHTML = '<option value="">Select Category</option>';

        // Filter and add options based on selected Asset Type and condition = 'ASSET_CATEGORY'
        optionData.forEach(function(option) {
            if (option.condition === 'ASSET_CATEGORY' && option.typegcm === selectedType) {
                var newOption = document.createElement('option');
                newOption.value = option.description;
                newOption.text = option.description;
                assetCategoryDropdown.appendChild(newOption);
            }
        });
    });
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
            </script>
@endsection