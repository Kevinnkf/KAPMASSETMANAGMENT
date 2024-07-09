@extends('layouts.app-auth')

@section('styles')
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">
        <div class="min-vh-100 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/dist/images/logos/kai-group-white-logo.svg') }}" alt="kai-logo" height="50"
                style="position:absolute; left:24px; top:24px; z-index: 1;" />
            {{-- Background --}}
            <div id="carousel-banner" class="carousel slide w-100" data-bs-ride="carousel">
                <div class="carousel-indicators" id="carousel-indicators">
                    {{-- fetch by ajax --}}
                </div>
                <div class="carousel-inner" id="carousel-inner">
                    {{-- fetch by ajax --}}
                </div>
            </div>
            {{-- End Background --}}
            <div class="position-absolute container-fluid d-flex align-items-center justify-content-center w-100 mt-3">
                <div class="row justify-content-end w-100">
                    <div class="col-lg-12 col-xl-4 col-xxl-4">
                        <div class="card mb-0 rounded-4">
                            <div class="card-body">
                                <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" class="mb-4"
                                    width="120" alt="">
                                <div class="row mt-2">
                                    <h4 style="font-size: 24px;">Login HRIS</h4>
                                    <p style="font-size: 14px; color: #818181;">Silahkan masukkan NIPP dan password yang Anda dapatkan dari administrator</p>
                                </div>

                                {{-- form  --}}
                                <form method="POST" action="{{ route('login-form') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="username" >NIPP</label>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" autocomplete="off" autofocus
                                            placeholder="NIPP">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 form-password-toggle">
                                        <label for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="off" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <?php
                                    $oplist = ['+'];
                                    $min = 0;
                                    $max = 10;
                                    
                                    $random_number1 = random_int($min, $max);
                                    $random_number2 = random_int($min, $max);
                                    $op = $oplist[0];
                                    
                                    $text = $random_number1 . ' ' . $op . ' ' . $random_number2;
                                    $res = $op == '+' ? $random_number1 + $random_number2 : $random_number1 - $random_number2;
                                    ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div style="padding: 6px;text-align:center;background-color: #d7daf7">
                                                <span
                                                    style="font-size: 20px; font-style: italic; font-weight: bold;">{{ $text }}</span>
                                            </div>
                                            <input id="cptres" type="hidden" name="cptres" autocomplete="off"
                                                value="{{ $res }}">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="captcha" type="text"
                                                    class="form-control @error('captcha') is-invalid @enderror"
                                                    name="captcha" autocomplete="off" placeholder="Captcha">
                                                @error('captcha')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <a href="{{ route('forget-password') }}" class="btn btn-link"
                                            style="font-size: 13px; text-decoration:none;">
                                            Lupa Password?
                                        </a>
                                    </div>
                                    <button type="submit" class="btn glow w-100 position-relative btn-primary mb-2">Login
                                        <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // fetch api slide login
        var url = "{{ $urlSlideLogin }}";
        $.ajax({
            url: url + "?search&tag=1&type=3",
            type: "GET",
            data: null,
        }).then(function(data) {
            if (data['status'].toLowerCase() === "success") {
                var dataSlideLogin = data['data'];

                // fetch slide login
                $('#carousel-inner').empty();
                dataSlideLogin.forEach((data, index) => {
                    var row = `<div class="carousel-item active" data-bs-interval="5000">
                                    <img src="` + data['imageLink'] + `" class="vh-100" style="object-fit:cover; width: 100%;"
                                    alt="login-banner-` + (index + 1) + `">
                                </div>`;
                    if (index > 0) {
                        row = `<div class="carousel-item" data-bs-interval="5000">
                                    <img src="` + data['imageLink'] + `" class="vh-100" style="object-fit:cover; width: 100%;"
                                    alt="login-banner-` + (index + 1) + `">
                                </div>`;
                    }
                    $("#carousel-inner").append(row);
                });

                // fetch indicator slide login
                $('#carousel-indicators').empty();
                dataSlideLogin.forEach((data, index) => {
                    var row =
                        `<button type="button" data-bs-target="#carousel-banner" data-bs-slide-to="` +
                        index + `"
                            class="active" aria-current="true" aria-label="Slide ` + (index + 1) + `"></button>`;
                    if (index > 0) {
                        row =
                            `<button type="button" data-bs-target="#carousel-banner" data-bs-slide-to="` +
                            index + `"
                            aria-label="Slide ` + (index + 1) + `"></button>`;
                    }
                    $("#carousel-indicators").append(row);
                });

            } else {
                Swal.fire({
                    title: 'Info!',
                    text: data['message'] ?? "Error Get Slide Login",
                    icon: 'info',
                });
            }
        }).catch((error) => {
            Swal.fire({
                title: 'Error!',
                text: error.responseJSON.message ?? "Error",
                icon: 'error',
            });
        });
    </script>
@endsection
