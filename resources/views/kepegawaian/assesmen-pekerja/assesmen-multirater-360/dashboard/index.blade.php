@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    {{-- Breadcrumb --}}
    @include('kepegawaian.assesmen-pekerja.assesmen-multirater-360.breadcrumb')
    {{-- End Breadcrumb --}}

    {{-- Top Bar --}}
    @include('kepegawaian.assesmen-pekerja.assesmen-multirater-360.topbar')
    {{-- End Top Bar --}}

    {{-- Pengumuman 1 --}}
    <div class="alert alert-primary bg-light alert-dismissible mt-1" role="alert">
        <div class="row align-items-center">
            <div class="col-auto">
                <i class="ti ti-help"></i>
            </div>
            <div class="col">
                <p>Pemetaan pegawai dilakukan sistem berdasarkan struktur organisasi dan data kepegawaian SAP HR per 15
                    November
                    2022.</p>
                <p class="pb-0 mb-0">Jika terdapat ketidaksesuaian / tidak mengenal yang dinilai, dapat menghubungi MCDC
                    Kantor
                    Pusat
                    untuk wilayah kantor Pusat di Toka 16421/16422/16423 dan WA Helpdesk MCDM 082118686959, sedangkan
                    untuk
                    daerah
                    dapat menghubungi operator sdm daerah masing-masing.</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- End Pengumuman 1 --}}

    {{-- Pengumuman 2 --}}
    <div class="alert alert-primary bg-light alert-dismissible mt-3" role="alert">
        <div class="row align-items-center">
            <div class="col-auto">
                <i class="ti ti-help"></i>
            </div>
            <div class="col">
                <h5 class="fw-medium pb-0 mb-0">Petunjuk Asesmen</h5>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- End Pengumuman 2 --}}

    {{-- Content --}}
    <div class="row align-items-center">
        <div class="col">
            <h4 class="fw-semibold mt-3 text-primary-kai">Assesmen Multirater 360</h4>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-outline-dark">
                Profil Kompetensi
            </button>
            <button type="button" class="btn btn-primary">
                Hasil Asesmen Multirater
            </button>
        </div>


        <ul class="nav nav-pills user-profile-tab px-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-asesmen-multirater-360-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-asesmen-multirater-360" type="button" role="tab"
                    aria-controls="pills-asesmen-multirater-360" aria-selected="true">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Asesmen Multirater 360</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-asesmen-multirater-360-dinilai-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-asesmen-multirater-360-dinilai" type="button" role="tab"
                    aria-controls="pills-asesmen-multirater-360-dinilai" aria-selected="false">
                    <i class="ti ti-bell me-2 fs-6"></i>
                    <span class="d-none d-md-block">Asesmen Multirater 360 Yang Harus Dinilai</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-skor-akhir-sudah-dinilai-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-skor-akhir-sudah-dinilai" type="button" role="tab"
                    aria-controls="pills-skor-akhir-sudah-dinilai" aria-selected="false">
                    <i class="ti ti-article me-2 fs-6"></i>
                    <span class="d-none d-md-block">Skor Akhir yang Sudah Dinilai</span>
                </button>
            </li>
        </ul>

        <div class="card-body px-3">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-asesmen-multirater-360" role="tabpanel"
                    aria-labelledby="pills-asesmen-multirater-360-tab" tabindex="0">
                    @include('kepegawaian.assesmen-pekerja.assesmen-multirater-360.dashboard.section-asesmen-multirater-360')
                </div>
                <div class="tab-pane fade" id="pills-asesmen-multirater-360-dinilai" role="tabpanel"
                    aria-labelledby="pills-asesmen-multirater-360-dinilai-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Notification Preferences</h4>
                                    <p>
                                        Select the notificaitons ou would like to receive via email. Please note that you
                                        cannot opt out of receving service
                                        messages, such as payment, security or legal notifications.
                                    </p>
                                    <form class="mb-7">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Email
                                            Address*</label>
                                        <input type="text" class="form-control" id="exampleInputtext" placeholder=""
                                            required>
                                        <p class="mb-0">Required for notificaitons.</p>
                                    </form>
                                    <div class="">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-article text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Our newsletter</h5>
                                                    <p class="mb-0">We'll always let you know about important changes</p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-checkbox text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Order Confirmation</h5>
                                                    <p class="mb-0">You will be notified when customer order any product
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-clock-hour-4 text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Order Status Changed</h5>
                                                    <p class="mb-0">You will be notified when customer make changes to
                                                        the order</p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-truck-delivery text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Order Delivered</h5>
                                                    <p class="mb-0">You will be notified once the order is delivered</p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-mail text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Email Notification</h5>
                                                    <p class="mb-0">Turn on email notificaiton to get updates through
                                                        email</p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Date & Time</h4>
                                    <p>Time zones and calendar display settings.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-7">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-clock-hour-4 text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Time zone</p>
                                                <h5 class="fs-4 fw-semibold">(UTC + 02:00) Athens, Bucharet</h5>
                                            </div>
                                        </div>
                                        <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Download">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Ignore Tracking</h4>
                                    <div class="d-flex align-items-center justify-content-between mt-7">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-player-pause text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <h5 class="fs-4 fw-semibold">Ignore Browser Tracking</h5>
                                                <p class="mb-0">Browser Cookie</p>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button class="btn btn-primary">Save</button>
                                <button class="btn btn-light-danger text-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-skor-akhir-sudah-dinilai" role="tabpanel"
                    aria-labelledby="pills-skor-akhir-sudah-dinilai-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Billing Information</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Business Name*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        placeholder="Visitor Analytics">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Business Address*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        placeholder="">
                                                </div>
                                                <div class="">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">First Name*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Business Sector*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        placeholder="Arts, Media & Entertainment">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Country*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        placeholder="Romania">
                                                </div>
                                                <div class="">
                                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Last
                                                        Name*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Current Plan : <span
                                            class="text-success">Executive</span></h4>
                                    <p>Thanks for being a premium member and supporting our development.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-7 mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-package text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Current Plan</p>
                                                <h5 class="fs-4 fw-semibold">750.000 Monthly Visits</h5>
                                            </div>
                                        </div>
                                        <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add">
                                            <i class="ti ti-circle-plus"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <button class="btn btn-primary">Change Plan</button>
                                        <button class="btn btn-outline-danger">Reset Plan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Payment Method</h4>
                                    <p>On 26 December, 2023</p>
                                    <div class="d-flex align-items-center justify-content-between mt-7">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-credit-card text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <h5 class="fs-4 fw-semibold">Visa</h5>
                                                <p class="mb-0 text-dark">*****2102</p>
                                            </div>
                                        </div>
                                        <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Edit">
                                            <i class="ti ti-pencil-minus"></i>
                                        </a>
                                    </div>
                                    <p class="my-2">If you updated your payment method, it will only be dislpayed here
                                        after your next billing cycle.</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <button class="btn btn-outline-danger">Cancel Subscription</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button class="btn btn-primary">Save</button>
                                <button class="btn btn-light-danger text-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection

@section('scripts')
@endsection
