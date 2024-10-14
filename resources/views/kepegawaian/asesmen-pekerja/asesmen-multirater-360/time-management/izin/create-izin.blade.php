@extends('layouts.app')

@section('content')
    <div class="contaner">
        {{-- Breadcrumb --}}
        @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
        {{-- End Breadcrumb --}}
        <div>
            <h3 class="fw-semibold mt-3 text-secondary-kai ">{{ $title }}</h3>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        @foreach ($data as $item)
                        <form id="formCreateData" method="POST">
                            <h5 class="card-title fw-semibold mb-4 text-primary">Data Pegawai</h5>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama pegawai" value="{{ $item['nama'] }}" readonly>
                                <div class="invalid-feedback">
                                    Nama harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="profile_URL" id="profile_URL" placeholder="Nomor NIPP" value="{{ $profile_URL }}">
                                <label for="nipp" class="form-label">NIPP</label>
                                <input type="text" class="form-control" name="nipp" id="nipp" placeholder="Nomor NIPP" value="{{ $item['nipp'] }}" readonly>
                                <div class="invalid-feedback">
                                    NIPP harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan anda" value="{{ $item['jabatan'] }}" readonly>
                                <div class="invalid-feedback">
                                    Jabatan harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Unit kerja" value="{{ $item['unitKerja'] }}" readonly>
                                <div class="invalid-feedback">
                                    Unit kerja harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"  id="email" placeholder="Email" value="{{ $item['email'] }}" readonly>
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
                                        <input class="form-check-input" type="radio" name="tipe_izin" id="tipe_izin"
                                            value="1">
                                        <label class="form-check-label" for="izin_datang">Izin datang terlambat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipe_izin" id="tipe_izin"
                                            value="2" checked>
                                        <label class="form-check-label" for="izin_pulang">Izin pulang cepat</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal_izin" id="tanggal_izin">
                                <div class="invalid-feedback">
                                    Tanggal harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" class="form-control" name="jam_izin" id="jam_izin" step="1" value="00:00:00">
                                <div class="invalid-feedback">
                                    Jam harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nomor" class="form-label">Nomor</label>
                                <input type="number" class="form-control" name="telepon"  id="telepon"
                                    placeholder="Nomor yang bisa dihubungi">
                                <div class="invalid-feedback">
                                    Nomor harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alasan" class="form-label">Alasan</label>
                                <input type="text" class="form-control" name="alasan"  id="alasan" placeholder="Alasan pengajuan">
                                <div class="invalid-feedback">
                                    Alasan harus diisi.
                                </div>
                            </div>
                            <hr>

                            <!-- Data Atasan Section -->
                            <h5 class="card-title fw-semibold mb-3 mt-4 text-primary">Data Atasan</h5>
                            <div class="mb-3">
                                <label for="nama_atasan" class="form-label">Nama Atasan</label>
                                <input type="text" class="form-control" name="nama_atasan" id="nama_atasan" placeholder="Nama atasan" value="{{ $item['namaAtasan'] }}" readonly>
                                <div class="invalid-feedback">
                                    Nama atasan harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nipp_atasan" class="form-label">NIPP</label>
                                <input type="text" class="form-control" name="nipp_atasan" id="nipp_atasan" placeholder="Nomor NIPP" value="{{ $item['nippAtasan'] }}" readonly>
                                <div class="invalid-feedback">
                                    NIPP atasan harus diisi.
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="jabatan_atasan" class="form-label">Jabatan Atasan</label>
                                <input type="text" class="form-control" name="jabatan_atasan" id="jabatan_atasan"
                                    placeholder="Jabatan atasan" value="{{ $item['posisiAtasan'] }}" readonly>
                                <div class="invalid-feedback">
                                    Jabatan atasan harus diisi.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email_atasan" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_atasan" id="email_atasan" placeholder="Email" value="{{ $item['emailAtasan'] }}" readonly>
                                <div class="invalid-feedback">
                                    Masukkan email atasan yang valid.
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="mt-4">
                                <button type="button" class="btn btn-outline-dark me-2">Kembali</button>
                                {{-- <button type="button" class="btn btn btn-primary" id="ajukan">Ajukan</button> --}}
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Ajukan
                                </button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection
@section('scripts')
<script>
//submit data
$('#formCreateData').submit(function(event) {
            $(".error_span").addClass("d-none");
            event.preventDefault();
            Swal.fire({
                title: "Apakah kamu yakin akan mengajukan izin ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Ajukan",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: 'btn btn-primary btn-md',
                    cancelButton: 'btn btn-danger btn-md',
                    loader: 'custom-loader'
                },
                buttonsStyling: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    var dataArray = {
                        tipe_izin: $('#tipe_izin').val(),
                        tanggal_izin: $('#tanggal_izin').val(),
                        jam_izin: $('#jam_izin').val().slice(0, 2) + ':' + $('#jam_izin').val().slice(3, 5) + ':00',
                        alasan: $('#alasan').val(),
                        telepon: $('#telepon').val(),
                        email: $('#email').val(),
                        nipp_atasan: $('#nipp_atasan').val(),
                        nama_atasan: $('#nama_atasan').val(),
                        email_atasan: $('#email_atasan').val(),
                        jabatan_atasan: $('#jabatan_atasan').val(),
                        photo_profile: $('#profile_URL').val(),
                    }
                    var url = "{{ route('time-management.izin.store') }}";

                    // submit the form data
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: dataArray,
                    }).then((response) => {
                        if (response.status == "success") {
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
                                        window.location.href = '{{ route('time-management.izin.index') }}'; // URL halaman status
                                    } else {
                                        // Aksi untuk tombol "Ke Halaman Izin"
                                        window.location.href = '{{ route('time-management.izin.index') }}'; // URL halaman izin
                                    }
                                });
                            }else {
                            Swal.fire({
                                title: "Gagal Kirim Pengajuan",
                                text: response.message,
                                icon: "error",
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#1a202c',
                                confirmButtonAlign: 'center',
                                buttonsStyling: true,
                                customClass: {
                                    confirmButton: 'btn-ok',
                                }
                            });
                        }
                    }).catch((error) => {
                        Swal.fire({
                                title: "Gagal Kirim Pengajuan",
                                text: error.responseJSON.message,
                                icon: "error",
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#1a202c',
                                confirmButtonAlign: 'center',
                                buttonsStyling: true,
                                customClass: {
                                    confirmButton: 'btn-ok',
                                }
                            });
                    })
                }
            });
        });
</script>
@endsection
