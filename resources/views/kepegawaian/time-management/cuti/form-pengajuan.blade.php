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

    <?php
    // Sesuaikan timezone dengan lokasi
    date_default_timezone_set('Asia/Jakarta');
    ?>

    {{-- Breadcrumb --}}
    @include('kepegawaian.time-management.cuti.breadcrumb')
    {{-- End Breadcrumb --}}

    <!-- Header -->
    <div class="py-3">
        <div class="esa-header">
            <div class="esa-header-dark">Formulir Pengajuan Cuti</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <!-- List Validasi Form - Aktifkan Jika Diperlukan -->
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}

                    <form action="{{ route('submit-cuti') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <!-- Data Pegawai -->
                    <h4 class="esa-title">Data Pegawai</h4>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nama" class="form-label esa-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama pegawai" required>
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nipp" class="form-label esa-label">NIPP</label>
                            <input type="text" class="form-control @error('nipp') is-invalid @enderror" id="nipp" name="nipp" value="{{ old('nipp') }}" placeholder="Nomor NIPP" required>
                            @error('nipp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="jabatan" class="form-label esa-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" placeholder="Jabatan anda" required>
                            @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="unit_kerja" class="form-label esa-label">Unit Kerja</label>
                            <input type="text" class="form-control @error('unit_kerja') is-invalid @enderror" id="unit_kerja" name="unit_kerja" value="{{ old('unit_kerja') }}" placeholder="Unit kerja" required>
                            @error('unit_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email" class="form-label esa-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <!-- Data Cuti -->
                    <h4 class="esa-title">Data Cuti</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jenis_cuti" class="form-label esa-label">Jenis Cuti</label>
                            <select class="form-select @error('jenis_cuti') is-invalid @enderror" id="jenis_cuti" name="jenis_cuti" value="{{ old('jenis_cuti') }}" required>
                                <option value="">Pilih Jenis Cuti</option>
                                <option value="Tahunan" {{ ((old('jenis_cuti') == 'Tahunan') ? "selected" : '' ) }}>Cuti Tahunan</option>
                                <option value="Sakit" {{ ((old('jenis_cuti') == 'Sakit') ? "selected" : '' ) }}>Cuti Sakit</option>
                            </select>
                            @error('jenis_cuti')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-3" style="">
                        <label for="lampiran" class="form-label esa-label">Lampiran</label>


                        <div class="border p-3 rounded dz-esa" id="file-dropzone">
                            <div class="dz-message" data-dz-message>
                                <div class="ti ti-folder" style="background-color: #F7F7F7; font-size: 40px; radius:8px; padding:8px; margin-bottom:8px;"></div><br>
                                <div class="text-primary-kai">Upload a document <span class="esa-sub-label">or drag and drop</span></div>
                                <div class="esa-sub2-label">PDF, DOC, JPG, PNG up to 10MB</div>
                            </div>

                            <div class="card" id="dz-template" style="display: none; background-color: #F9F9F9;">
                                <div class="dz-preview dz-file-preview dz-processing dz-error dz-complete">

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="dz-details">
                                                        <div class="dz-filename"><span data-dz-name></span></div>
                                                        <div class="dz-size text-muted" data-dz-size></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div>
                                                        <a href="#" class="btn dz-remove" data-dz-remove style="color: #818181;" >Hapus</a>
                                                        <a href="#" class="btn text-primary-kai" >Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                        <div class="dz-success-message"><span data-dz-successmessage></span></div>
                                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="card" style="background-color: #F9F9F9;">
                            <div class="card-body">
                                <!-- First file - successfully uploaded -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span>Lampiran.pdf</span>
                                            <br>
                                            <span class="text-muted">Ukuran - 1.00MB</span>
                                        </div>
                                        <div>
                                            <a href="#" class="btn" style="color: #818181;" onclick="hapusLampiran()">Hapus</a>
                                            <a href="#" class="btn text-primary-kai" onclick="editLampiran()">Edit</a>
                                        </div>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; background-color:#42B243; " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small class="esa-sub-label text-success" style="font-weight:600; color:#42B243;">Berhasil mengunggah</small>
                                </div>

                                <!-- Second file - failed to upload -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span>Lampiran.pdf</span>
                                            <br>
                                            <span class="text-muted">Ukuran - 1.00MB</span>
                                        </div>
                                        <div>
                                            <a href="#" class="btn ti ti-refresh" style="color:#585858;" onclick="refreshLampiran()"></a>
                                        </div>
                                    </div>
                                    <small class="esa-sub-label text-danger" style="font-weight:600; color: #E6251C;">Gagal mengunggah</small>
                                </div>
                            </div>
                        </div> --}}

                        @if ($errors->has('lampiran'))
                            <div class="text-danger">{{ $errors->first('lampiran') }}</div>
                        @endif
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tanggal_mulai" class="form-label esa-label">Tanggal Mulai Cuti</label>
                            <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" placeholder="Pilih tanggal" required onchange="hitungLamaCuti()" >
                            @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_akhir" class="form-label esa-label">Tanggal Berakhir Cuti</label>
                            <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" id="tanggal_akhir" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" placeholder="Pilih tanggal" required onchange="hitungLamaCuti()" >
                            @error('tanggal_akhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3" id="lama_cuti">
                        <div class="col-md-6">
                            <label for="lama_cuti" class="form-label esa-sub-label">Lama cuti <span class="form-label esa-sub-label" style="font-weight: 700; line-height: 16px;" id="lama_hari">2 hari</span></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="alamat" class="form-label esa-label">Alamat Saat Cuti</label>
                            <select class="form-select @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>
                                <option value="">Masukan alamat lengkap</option>
                                <option value="Jalan" {{ ((old('alamat') == 'Jalan') ? "selected" : '' ) }}>Jalan</option>
                            </select>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kontak" class="form-label esa-label">Kontak yang Dapat Dihubungi</label>
                            <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak') }}" placeholder="+62 000 000 000" required>
                            @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <!-- Data Atasan -->
                    <h4 class="esa-title">Data Atasan</h4>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nama_atasan" class="form-label esa-label">Nama Atasan</label>
                            <input type="text" class="form-control @error('nama_atasan') is-invalid @enderror" id="nama_atasan" name="nama_atasan" value="{{ old('nama_atasan') }}" placeholder="Nama Atasan" required>
                            @error('nama_atasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nipp_atasan" class="form-label esa-label">NIPP</label>
                            <input type="text" class="form-control @error('nipp_atasan') is-invalid @enderror" id="nipp_atasan" name="nipp_atasan" value="{{ old('nipp_atasan') }}" placeholder="Nomor NIPP" required>
                            @error('nipp_atasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="jabatan_atasan" class="form-label esa-label">Jabatan Atasan</label>
                            <input type="text" class="form-control @error('jabatan_atasan') is-invalid @enderror" id="jabatan_atasan" name="jabatan_atasan" value="{{ old('jabatan_atasan') }}" placeholder="Jabatan Atasan" required>
                            @error('jabatan_atasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="email_atasan" class="form-label esa-label">Email Atasan</label>
                            <input type="email" class="form-control @error('email_atasan') is-invalid @enderror" id="email_atasan" name="email_atasan" value="{{ old('email_atasan') }}" placeholder="Email" required>
                            @error('email_atasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="button-group">
                        <button type="button" class="btn btn-outline-muted esa-btn-lg" onclick="window.location='{{ url('/kepegawaian/time-management/cuti') }}'">Kembali</button>
                        <button type="submit" class="btn btn-primary esa-btn-lg">Ajukan</button>
                    </div>

                    </form>
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

