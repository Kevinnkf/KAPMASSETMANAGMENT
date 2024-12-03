<!-- Form di dalam modal -->
<form>
    {{-- aria-hidden="true"> --}}
    <div class="modal-content px-3">
        <div class="modal-header d-flex align-items-center">
            <h6 class="modal-title text-primary" id="myModalLabel">
                <b>Apakah kamu ingin menanggapi pengajuan ini?</b>
            </h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <hr style="width: 95%; margin: 0 auto;">
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <span id="statusDinasTanggapi"></span>
                </div>
                <div class="col text-end">
                    <span class="text-grey" id="jamDinasTanggapi"></span>
                </div>
            </div>
            <div>
                <span class="text-dark" id="ketDinasTanggapi"></span>
            </div>
            <div>
                <span class="text-grey mb-2" id="createDinasTanggapi"></span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col d-flex align-items-stretch">
                {{-- <div class="card w-100"> --}}
                <div class="p-2 d-flex align-items-stretch h-100">
                    <div class="row">
                        <div class="col-4 col-md-3 d-flex align-items-left">
                            <img src="{{ asset('assets/dist/images/profile/user-7.jpg') }}" class="rounded img-fluid" />
                        </div>
                        <div class="col-8 col-md-9 d-flex align-items-center">
                            <div>
                                <h4 class="text-dark fs-4 lh-sm">
                                    <b id="namaPegawaiTanggapi"></b>
                                </h4>
                                <h6 class="card-subtitle mb-1 fw-normal text-primary">
                                    <span id="posisiPegawai"></span>
                                </h6>
                                <p class="text-muted mb-0">
                                    NIPP : <span id="nippPegawaiTanggapi"></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card w-100 mb-2">
                        <div class="card-body-app m-0 p-0 " style="background: #F9F9F9">
                            <div class="d-flex flex-column">
                                <div class="bg-light p-3 rounded">
                                    <h6 class="fw-semibold mb-6">Informasi Dinas</h6>
                                    <input type="text" id="inputId" name="idizin">
                                    <div class="row mb-8">
                                        <div class="col-4">
                                            <label>Jenis dinas</label>
                                        </div>
                                        <div class="col-8">
                                            : <span class="form-label" id="tipeDinasTanggapi"></span>
                                        </div>
                                        <div class="col-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="tanggalMulaiDinas"></span> </label>
                                        </div>
                                        <div class="col-4">
                                            <label>Tanggal Berakhir</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="tanggalAkhirDinas"></span></label>
                                        </div>
                                        <div class="col-4">
                                            <label>Jumlah Hari</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="jumlahHari"> </span> Hari</label>
                                        </div>
                                        <div class="col-4">
                                            <label>Tujuan dinas</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="tujuanDinas"></span></label>
                                        </div>
                                        <div class="col-4">
                                            <label>Nomor telepon</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="telepon"></span></label>
                                        </div>
                                        <div class="col-4">
                                            <label>Unit Kerja</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label ">: <span id="unitPegawai"></span></label>
                                        </div>
                                    </div>
                                    <h6 class="fw-semibold mb-8">Data Atasan</h6>
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Nama Atasan</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="namaAtasTanggapi"></span></label>
                                        </div>
                                        <div class="col-4">
                                            <label>NIPP</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="nippAtasanTanggapi"></span></label>
                                        </div>
                                        <div class="col-4">
                                            <label>Jabatan Atasan</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="posisiAtasanTanggapi"></span></label>
                                        </div>
                                        <div class="col-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-8">
                                            <label class="form-label">: <span id="emailAtasanTanggapi"></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="border-top: 0;">
            <div class="row w-100">
                <div class="col-6" style="padding: 0 0px 0 0;">
                    <button type="button"
                        class="btn waves-effect waves-light btn-rounded btn-outline-danger fs-2 fw-bolder w-100"
                        data-bs-dismiss="modal" id="sa-tolak">
                        Tolak Pengajuan
                    </button>
                </div>
                <div class="col-6" style="padding: 0 0 0 2px;">
                    <button type="button"
                        class="btn waves-effect waves-light text-light btn-rounded btn-primary fs-2 fw-bolder w-100"
                        id="dinas-setuju">
                        Setujui Pengajuan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('scripts')
    <script>
        $("#sa-tolak").click(function() {
            Swal.fire({
                title: "<strong>Apakah anda ingin membatalkan?</strong>",
                icon: "question",
                html: `
		<p>Berikan alasan kenapa anda membatalkan pengajuan</p>
		<p style="text-align: left;">Alasan Membatalkan Pengajuan</p>
		<textarea id="alasan" class="swal2-input" placeholder="Tuliskan alasan Anda...." style="width: 100%;height:160px; border: 1px solid #ccc; padding: 10px;"></textarea>
	`,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Batalkan Pengajuan', // Tombol di kanan
                cancelButtonText: 'Kembali', // Tombol di
                reverseButtons: true, // agar urutan tombol berubah jika diinginkan
                focusConfirm: false,
                customClass: {
                    cancelButton: 'btn-kembali', // Gaya untuk tombol "Kembali"
                },
                preConfirm: () => {
                    const alasan = document.getElementById('alasan').value;
                    if (!alasan) {
                        Swal.showValidationMessage('Alasan pembatalan wajib diisi!');
                    }
                    return alasan;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const alasan = result.value;
                    console.log("Alasan Pembatalan:", alasan);
                    Swal.fire({
                        title: "Pengajuan Dinas Ditolak",
                        text: "Harap cek lanjut status pengajuan formulir dinas melalui dashboard halaman dinas",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Ke Halaman Pengajuan Dinas',
                        cancelButtonText: 'Lihat Status',
                        // reverseButtons: true, // agar urutan tombol berubah jika diinginkan
                        customClass: {
                            actions: 'my-actions',
                            confirmButton: 'lihat-status', // Menambah kelas untuk lebar penuh
                            cancelButton: 'ke-hal-dinas', // Menambah kelas untuk lebar penuh
                            icon: 'custom-warning'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Aksi untuk tombol "Lihat Status"
                            window.location.href = '#'; // URL halaman status
                        } else {
                            // Aksi untuk tombol "Ke Halaman Izin"
                            window.location.href = '#'; // URL halaman izin
                        }
                    });
                }
            });
        });
    </script>
@endsection
