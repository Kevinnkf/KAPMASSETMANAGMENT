<!-- MODAL DETAIL PENGAJUAN -->
<div class="modal fade" id="modalDetailIzin" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content px-3">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title text-primary" id="myModalLabel">
                    <b>Detail Pengajuan Izin</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr style="width: 95%; margin: 0 auto;">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <span id="statusIzin"></span>
                    </div>
                    <div class="col text-end">
                        <span class="text-grey" id="jamIzin"></span>
                    </div>
                </div>
                <div>
                    <span id="ketIzin"></span>
                </div>
                <div>
                    <span class="text-grey mb-2" id="createIzin"></span>
                </div>
            </div>
            <hr style="width: 95%; margin: 0 auto;" class="mb-2">
            <div class="container">
                <input type="hidden" id="input_id">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Tipe Izin
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="tipeIzin"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Tanggal
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="tanggal"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Jam
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="jam"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Jumlah Jam
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="jumlahJam"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Atasan
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="namaAtasan"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            NIPP Atasan
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="nippAtasan"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Nomer Telepon
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="telepon"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Alasan
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; <span id="alasan"></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width: 95%; margin: 0 auto;" class="mb-1">
            <div id="statusPengajuan">
            </div>
        </div>
    </div>
</div>
<!-- END MODAL DETAIL PENGAJUAN -->

<!-- START MODAL TOLAK PENGAJUAN -->
<div class="modal fade" id="modalSaTolak" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content px-3">
            <div class="modal-header d-flex align-items-center">
            </div>
            <div class="modal-body" style="padding-top: 0;padding-bottom: 0">
                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                    <img src="{{ asset('assets/dist/images/svgs/Pop-State-con.svg') }}" alt="tes"
                        style="width: 100px; height: 100px;">
                </div>
                <div class="d-flex flex-column text-center mt-3">
                    <h3 class="text-primary fw-bolder">Apakah anda ingin membatalkan?</h3>
                    <span class="mt-2 text-grey">Berikan alasan kenapa anda membatalkan pengajuan</span>
                </div>
                <div class="mt-3">
                    <div class="mb-2">
                        <div class="text-dark mb-2">
                            Alasan Membatalkan Pengajuan
                        </div>
                        <div>
                            <textarea id="alasanTolak" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex mt-2 mb-4" style="padding-top: 0; padding-bottom: 0;">
                <div class="flex-grow-1 me-1">
                    <button type="button" class="btn w-100 btn-rounded btn-outline-dark fs-2 fw-bolder"
                        data-bs-dismiss="modal">
                        Kembali
                    </button>
                </div>
                <div class="flex-grow-1 ms-1">
                    <button id="sa-tolak-yes" type="button"
                        class="btn w-100 btn-rounded btn-outline-danger fs-2 fw-bolder" data-bs-dismiss="modal">
                        Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL TOLAK PENGAJUAN -->

<!-- MODAL DETAIL TANGGAPI -->
<div class="modal fade" id="ModalTanggapi" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content px-3">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title text-primary" id="myModalLabel">
                    <b>Apakah kamu ingin menanggapi <br> pengajuan ini?</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr style="width: 95%; margin: 0 auto;">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <span id="statusIzinTanggapi"></span>
                    </div>
                    <div class="col text-end">
                        <span class="text-grey" id="jamIzinTanggapi"></span>
                    </div>
                </div>
                <div>
                    <span class="text-dark" id="ketIzinTanggapi"></span>
                </div>
                <div>
                    <span class="text-grey mb-2" id="createIzinTanggapi"></span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col d-flex align-items-stretch">
                    <div class="p-2 d-flex align-items-stretch h-100">
                        <div class="row">
                            <div class="col-4 col-md-3 d-flex align-items-left">
                                <img src="{{ asset('assets/dist/images/profile/user-7.jpg') }}"
                                    class="rounded img-fluid" />
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
                                        NIPP : <span id="nippPegawaiTanggapi"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card w-100 mb-0 pb-0">
                            <div class="card-body-app" style="background: #F9F9F9">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Tipe Izin
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="tipe-izin">
                                            : <span id="tipeIzinTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Tanggal
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="tanggal-izin">
                                            : <span id="tanggalTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="jam-izin">
                                            : <span id="jamTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jumlah Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="jumlah-jam-izin">
                                            : <span id="jumlahJamTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="atasan-pegawai">
                                            : <span id="namaAtasanTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            NIPP Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="nipp-atasan-pegawai">
                                            : <span id="nippAtasanTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Nomer Telepon
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="nomer-telepon-pegawai">
                                            : <span id="teleponTanggapi"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="col-4 text-grey">
                                            Alasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="alasan-izin">
                                            : <span id="alasanTanggapi"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row w-100">
                    <div class="col-6" style="padding: 0 2px 0 0;">
                        <input type="hidden" id="inputId" name="idizin">
                        <button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-outline-danger fs-2 fw-bolder w-100"
                            id="sa-tolakTanggapi">
                            Tolak Pengajuan
                        </button>
                    </div>
                    <div class="col-6" style="padding: 0 0 0 2px;">
                        <button type="button"
                            class="btn waves-effect waves-light text-light btn-rounded btn-primary fs-2 fw-bolder w-100"
                            data-bs-dismiss="modal" id="sa-atasan-yes">
                            Setujui Pengajuan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL DETAIL TANGGAPI -->

<!-- START MODAL APPROVAL DETAIL  -->
<div class="modal fade" id="ModalApprovalDetail" tabindex="-1" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content px-3">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title text-primary" id="myModalLabel">
                    <b>Pengajuan Telah Disetujui</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr style="width: 95%; margin: 0 auto;">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <span id="statusIzinn"></span>
                    </div>
                    <div class="col text-end">
                        <span class="text-grey" id="jamIzinn"></span>
                    </div>
                </div>
                <div>
                    <span class="text-dark" id="ketIzinn"></span>
                </div>
                <div>
                    <span class="text-grey mb-2" id="createIzinn"></span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col d-flex align-items-stretch">
                    {{-- <div class="card w-100"> --}}
                    <div class="p-2 d-flex align-items-stretch h-100">
                        <div class="row">
                            <div class="col-4 col-md-3 d-flex align-items-left">
                                <img src="{{ asset('assets/dist/images/profile/user-7.jpg') }}"
                                    class="rounded img-fluid" />
                            </div>
                            <div class="col-8 col-md-9 d-flex align-items-center">
                                <div>
                                    <h4 class="text-dark fs-4 lh-sm">
                                        <b id="posisiPegawaii"></b>
                                    </h4>
                                    <h6 class="card-subtitle mb-1 fw-normal text-primary">
                                        <span id="namaPegawaii"></span>
                                    </h6>
                                    <p class="text-muted mb-0">
                                        NIPP : <span id="nippPegawaii"></span>
                                    </p>
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
                        <div class="card w-100 mb-0 pb-0">
                            <div class="card-body-app" style="background: #F9F9F9">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Tipe Izin
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="tipe-izin">
                                            : <span id="tipeIzinn"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Tanggal
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="tanggal-izin">
                                            : <span id="tanggall"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="jam-izin">
                                            : <span id="jamm"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jumlah Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="jumlah-jam-izin">
                                            : <span id="jumlahJamm"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="atasan-pegawai">
                                            : <span id="namaAtasann"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            NIPP Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="nipp-atasan-pegawai">
                                            : <span id="nippAtasann"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Nomer Telepon
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="nomer-telepon-pegawai">
                                            : <span id="teleponn"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="col-4 text-grey">
                                            Alasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder" id="alasan-izin">
                                            : <span id="alasann"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 95%; margin: 0 auto;" class="mb-1">
                        <div id="statusApprove"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- END MODAL APPROVAL DETAIL  -->

<!-- START MODAL TOLAK PENGAJUAN DARI ATASAN -->
<div class="modal fade" id="modalSaTolakAtasan" tabindex="-1" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content px-3">
            <div class="modal-header d-flex align-items-center">
            </div>
            <div class="modal-body" style="padding-top: 0;padding-bottom: 0">
                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                    <img src="{{ asset('assets/dist/images/svgs/Pop-State-con.svg') }}" alt="tes"
                        style="width: 100px; height: 100px;">
                </div>
                <div class="d-flex flex-column text-center mt-3">
                    <h3 class="text-primary fw-bolder">Apakah anda ingin membatalkan?</h3>
                    <span class="mt-2 text-grey">Berikan alasan kenapa anda membatalkan pengajuan</span>
                </div>
                <div class="mt-3">
                    <div class="mb-2">
                        <div class="text-dark mb-2">
                            Alasan Membatalkan Pengajuan
                        </div>
                        <div>
                            <textarea id="alasanTolakAtasan" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex mt-2 mb-4" style="padding-top: 0; padding-bottom: 0;">
                <div class="flex-grow-1 me-1">
                    <button type="button" class="btn w-100 btn-rounded btn-outline-dark fs-2 fw-bolder"
                        data-bs-dismiss="modal">
                        Kembali
                    </button>
                </div>
                <div class="flex-grow-1 ms-1">
                    <button id="atasan-tolak-yes" type="button"
                        class="btn w-100 btn-rounded btn-outline-danger fs-2 fw-bolder" data-bs-dismiss="modal">
                        Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL TOLAK PENGAJUAN - DARI ATASAN->
