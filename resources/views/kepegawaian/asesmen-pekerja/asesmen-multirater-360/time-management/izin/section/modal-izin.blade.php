<!-- MODAL DETAIL PENGAJUAN -->
<div class="modal fade" id="bs-example-modal-md" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                        <span class="mb-1 badge rounded-pill font-medium bg-light-secondary text-secondary">Menunggu
                            Diproses</span>
                    </div>
                    <div class="col text-end">
                        <span class="text-grey">10:12</span>
                    </div>
                </div>
                <div>
                    <span class="text-dark">Menunggu persetujuan atasan</span>
                </div>
                <div>
                    <span class="text-grey mb-2">12 Jan 2023</span>
                </div>
            </div>
            <hr style="width: 95%; margin: 0 auto;" class="mb-2">
            <div class="container">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Tipe Izin
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; Pulang Cepet
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Tanggal
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; 17 September 2024
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Jam
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; 10:00
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Jumlah Jam
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; 5 Jam
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Atasan
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; Luki Abdurahman
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            NIPP Atasan
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; 290013320
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Nomer Telepon
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; +6282115500778
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col-3 text-grey">
                            Alasan
                        </div>
                        <div class="col text-dark fw-bolder">
                            :&nbsp; Kepentingan Keluarga
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width: 95%; margin: 0 auto;" class="mb-1">
            <div class="modal-footer mb-2">
                <button type="button"
                    class="btn mb-1 waves-effect waves-light btn-rounded btn-outline-danger fs-2 fw-bolder w-100"
                    data-bs-dismiss="modal">
                    Batalkan Pengajuan
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL DETAIL TANGGAPI -->
<div class="modal fade" id="approval-pengajuan" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                        <span class="mb-1 badge rounded-pill font-medium bg-light-secondary text-secondary">Menunggu
                            Diproses</span>
                    </div>
                    <div class="col text-end">
                        <span class="text-grey">10:12</span>
                    </div>
                </div>
                <div>
                    <span class="text-dark">Menunggu persetujuan atasan</span>
                </div>
                <div>
                    <span class="text-grey mb-2">12 Jan 2023</span>
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
                                        <b>Darussalam</b>
                                    </h4>
                                    <h6 class="card-subtitle mb-1 fw-normal text-primary">
                                        Manager Quality control and implementation
                                    </h6>
                                    <p class="text-muted mb-0">
                                        NIPP : 2201981234567
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
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; Pulang Cepet
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Tanggal
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 17 September 2024
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 10:00
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jumlah Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 5 Jam
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; Luki Abdurahman
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            NIPP Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 290013320
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Nomer Telepon
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; +6282115500778
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="col-4 text-grey">
                                            Alasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; Kepentingan Keluarga
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
                        <button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-outline-danger fs-2 fw-bolder w-100"
                            data-bs-dismiss="modal" id="sa-tolak">
                            Tolak Pengajuan
                        </button>
                    </div>
                    <div class="col-6" style="padding: 0 0 0 2px;">
                        <button type="button"
                            class="btn waves-effect waves-light text-light btn-rounded btn-primary fs-2 fw-bolder w-100"
                            data-bs-dismiss="modal" id="sa-setuju">
                            Setujui Pengajuan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL APPROVAL DETAIL  -->
<div class="modal fade" id="approval-detail" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                        <span
                            class="mb-1 badge rounded-pill font-medium bg-light-success text-secondary">Disetujui</span>
                    </div>
                    <div class="col text-end">
                        <span class="text-grey">10:12</span>
                    </div>
                </div>
                <div>
                    <span class="text-dark">Menunggu persetujuan atasan</span>
                </div>
                <div>
                    <span class="text-grey mb-2">12 Jan 2023</span>
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
                                        <b>Darussalam</b>
                                    </h4>
                                    <h6 class="card-subtitle mb-1 fw-normal text-primary">
                                        Manager Quality control and implementation
                                    </h6>
                                    <p class="text-muted mb-0">
                                        NIPP : 2201981234567
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
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; Pulang Cepet
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Tanggal
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 17 September 2024
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 10:00
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Jumlah Jam
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 5 Jam
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; Luki Abdurahman
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            NIPP Atasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; 290013320
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="col-4 text-grey">
                                            Nomer Telepon
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; +6282115500778
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="col-4 text-grey">
                                            Alasan
                                        </div>
                                        <div class="col-auto text-dark fw-bolder">
                                            :&nbsp; Kepentingan Keluarga
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mb-2">
                <button type="button"
                    class="btn mb-1 waves-effect waves-light btn-rounded btn-outline-primary fs-2 fw-bolder w-100"
                    data-bs-dismiss="modal">
                    Kembali
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
