@extends('layouts.app')

@section('content')
    <div class="contaner">
        {{-- Breadcrumb --}}
        @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
        {{-- End Breadcrumb --}}
        <div>
            <h4 class="fw-semibold mt-3 text-secondary-kai h2 ">{{ $title }}</h4>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form id="izinForm">
                            <!-- Data Pegawai Section -->
                            <h5 class="card-title fw-semibold mb-4 text-primary">Data Pegawai</h5>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama pegawai">
                                <div class="invalid-feedback">
                                    Nama harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nipp" class="form-label">NIPP</label>
                                <input type="text" class="form-control" id="nipp" placeholder="Nomor NIPP">
                                <div class="invalid-feedback">
                                    NIPP harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan anda">
                                <div class="invalid-feedback">
                                    Jabatan harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                <input type="text" class="form-control" id="unit_kerja" placeholder="Unit kerja">
                                <div class="invalid-feedback">
                                    Unit kerja harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <div class="invalid-feedback">
                                    Masukkan email yang valid.
                                </div>
                            </div>
                            <hr>
                            <!-- Data Izin Section -->
                            <h5 class="card-title fw-semibold mb-3 mt-4 text-primary">Data Izin</h5>
                            <div class="mb-3">
                                <label class="form-label">Tipe izin</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipe_izin" id="izin_datang"
                                            value="datang">
                                        <label class="form-check-label" for="izin_datang">Izin datang terlambat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipe_izin" id="izin_pulang"
                                            value="pulang" checked>
                                        <label class="form-check-label" for="izin_pulang">Izin pulang cepat</label>
                                    </div>
                                </div>
                                <div class="invalid-feedback d-block" id="tipeIzinFeedback">
                                    Pilih tipe izin.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal">
                                <div class="invalid-feedback">
                                    Tanggal harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="jam">
                                <div class="invalid-feedback">
                                    Jam harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nomor" class="form-label">Nomor</label>
                                <input type="text" class="form-control" id="nomor"
                                    placeholder="Nomor yang bisa dihubungi">
                                <div class="invalid-feedback">
                                    Nomor harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alasan" class="form-label">Alasan</label>
                                <input type="text" class="form-control" id="alasan" placeholder="Alasan pengajuan">
                                <div class="invalid-feedback">
                                    Alasan harus diisi.
                                </div>
                            </div>
                            <hr>

                            <!-- Data Atasan Section -->
                            <h5 class="card-title fw-semibold mb-3 mt-4 text-primary">Data Atasan</h5>
                            <div class="mb-3">
                                <label for="nama_atasan" class="form-label">Nama Atasan</label>
                                <input type="text" class="form-control" id="nama_atasan" placeholder="Nama atasan">
                                <div class="invalid-feedback">
                                    Nama atasan harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nipp_atasan" class="form-label">NIPP</label>
                                <input type="text" class="form-control" id="nipp_atasan" placeholder="Nomor NIPP">
                                <div class="invalid-feedback">
                                    NIPP atasan harus diisi.
                                </div>
                            </div>

                            
                            <div class="mb-3">
                                <label for="jabatan_atasan" class="form-label">Jabatan Atasan</label>
                                <input type="text" class="form-control" id="jabatan_atasan"
                                    placeholder="Jabatan atasan">
                                <div class="invalid-feedback">
                                    Jabatan atasan harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email_atasan" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_atasan" placeholder="Email">
                                <div class="invalid-feedback">
                                    Masukkan email atasan yang valid.
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="mt-4">
                                <button type="button" class="btn btn-outline-dark me-2">Kembali</button>
                                <button type="submit" class="btn btn-primary" >Ajukan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection
@section('scripts')
    <script script>
        $("#ajukan").click(function() {
            event.preventDefault();
            Swal.fire({
                title: "Berhasil Kirim Pengajuan",
                html: '<span style="font-size: 16px;color:#818181">Hai, pengajuan kamu berhasil kami terima. Mohon tunggu beberapa waktu untuk disetujui oleh atasan / pejabat terkait!</span>', // Menggunakan HTML dengan style inline
                imageUrl: "{{ asset('assets/dist/images/svgs/Illustration.svg') }}",
                imageWidth: 200, // Sesuaikan ukuran ikon
                imageHeight: 200, // Sesuaikan ukuran ikon
                showCancelButton: true,
                confirmButtonText: 'Lihat Status',
                cancelButtonText: 'Kembali Ke Beranda',
                reverseButtons: true, // agar urutan tombol berubah jika diinginkan
                customClass: {
                    cancelButton: 'btn-kembali', // Gaya untuk tombol "Kembali"
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aksi untuk tombol "Lihat Status"
                    window.location.href = '#'; // URL halaman status
                } else {
                    // Aksi untuk tombol "Ke Halaman Izin"
                    window.location.href = '#'; // URL halaman izin
                }
            });
        });
    </script>
    <script>
        document.getElementById('izinForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let form = event.target;
            let isValid = true;

            // Validasi Nama
            let namaInput = document.getElementById('nama');
            if (!namaInput.value.trim()) {
                namaInput.classList.add('is-invalid');
                isValid = false;
            } else {
                namaInput.classList.remove('is-invalid');
            }

            // Validasi NIPP
            let nippInput = document.getElementById('nipp');
            if (!nippInput.value.trim()) {
                nippInput.classList.add('is-invalid');
                isValid = false;
            } else {
                nippInput.classList.remove('is-invalid');
            }

            // Validasi Jabatan
            let jabatanInput = document.getElementById('jabatan');
            if (!jabatanInput.value.trim()) {
                jabatanInput.classList.add('is-invalid');
                isValid = false;
            } else {
                jabatanInput.classList.remove('is-invalid');
            }

            // Validasi Unit Kerja
            let unitKerjaInput = document.getElementById('unit_kerja');
            if (!unitKerjaInput.value.trim()) {
                unitKerjaInput.classList.add('is-invalid');
                isValid = false;
            } else {
                unitKerjaInput.classList.remove('is-invalid');
            }

            // Validasi Email
            let emailInput = document.getElementById('email');
            if (!emailInput.value.trim() || !emailInput.checkValidity()) {
                emailInput.classList.add('is-invalid');
                isValid = false;
            } else {
                emailInput.classList.remove('is-invalid');
            }

            // Validasi Tanggal
            let tanggalInput = document.getElementById('tanggal');
            if (!tanggalInput.value.trim()) {
                tanggalInput.classList.add('is-invalid');
                isValid = false;
            } else {
                tanggalInput.classList.remove('is-invalid');
            }

            // Validasi Jam
            let jamInput = document.getElementById('jam');
            if (!jamInput.value.trim()) {
                jamInput.classList.add('is-invalid');
                isValid = false;
            } else {
                jamInput.classList.remove('is-invalid');
            }

            // Validasi Nomor
            let nomorInput = document.getElementById('nomor');
            if (!nomorInput.value.trim()) {
                nomorInput.classList.add('is-invalid');
                isValid = false;
            } else {
                nomorInput.classList.remove('is-invalid');
            }

            // Validasi Alasan
            let alasanInput = document.getElementById('alasan');
            if (!alasanInput.value.trim()) {
                alasanInput.classList.add('is-invalid');
                isValid = false;
            } else {
                alasanInput.classList.remove('is-invalid');
            }

            // Validasi Tipe Izin (Radio Button)
            let tipeIzinInput = document.querySelector('input[name="tipe_izin"]:checked');
            if (!tipeIzinInput) {
                document.getElementById('tipeIzinFeedback').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('tipeIzinFeedback').style.display = 'none';
            }

            // Validasi Nama Atasan
            let namaAtasanInput = document.getElementById('nama_atasan');
            if (!namaAtasanInput.value.trim()) {
                namaAtasanInput.classList.add('is-invalid');
                isValid = false;
            } else {
                namaAtasanInput.classList.remove('is-invalid');
            }

            // Validasi NIPP Atasan
            let nippAtasanInput = document.getElementById('nipp_atasan');
            if (!nippAtasanInput.value.trim()) {
                nippAtasanInput.classList.add('is-invalid');
                isValid = false;
            } else {
                nippAtasanInput.classList.remove('is-invalid');
            }

            // Validasi Jabatan Atasan
            let jabatanAtasanInput = document.getElementById('jabatan_atasan');
            if (!jabatanAtasanInput.value.trim()) {
                jabatanAtasanInput.classList.add('is-invalid');
                isValid = false;
            } else {
                jabatanAtasanInput.classList.remove('is-invalid');
            }

            // Validasi Email Atasan
            let emailAtasanInput = document.getElementById('email_atasan');
            if (!emailAtasanInput.value.trim() || !emailAtasanInput.checkValidity()) {
                emailAtasanInput.classList.add('is-invalid');
                isValid = false;
            } else {
                emailAtasanInput.classList.remove('is-invalid');
            }

            if (isValid) {
                form.submit();
            }
        });
    </script>
@endsection
