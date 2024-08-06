<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Title -->
    <title>{{ config('variables.appName') ? config('variables.appName') : 'KAI ESA' }}</title>
    <meta name="description"
        content="{{ config('variables.appDescription') ? config('variables.appDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.appKeyword') ? config('variables.appKeyword') : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" />
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/css/style.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/dist/css/app.css') }}">

    <style>
        .img-carousel {
            height: 60vh;
        }

        @media (max-width: 1024px) {
            .img-carousel {
                height: 29vh;
            }
        }

        @media (max-width: 860px) {
            .img-carousel {
                height: 25vh;
            }
        }

        @media (max-width: 415px) {
            .img-carousel {
                height: 17vh;
            }
        }

        .padding-content {
            padding: 0 32px;
        }

        .card:hover {
            transform: scale(1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .card-wo-border {
            cursor: pointer;
        }
        .portal-menu {
            cursor: pointer;
        }
        .portal-menu:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        @include('home.section.navbar-home')
        <div class="body-wrapper overflow-hidden">
            @include('home.section.section-carousel')

            @include('home.section.section-portal-menu')

            @include('home.section.section-berita-terbaru')
            
            @include('home.section.section-info-kesehatan')
        </div>

        @include('layouts.section.footer')

        <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header p-4" style="justify-content: start">
                <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" alt="img-fluid" height="40">
            </div>
            <div class="offcanvas-body p-3">
                @include('home.section.section-sidebar-menu')
            </div>
        </div>
    </div>

    @include('home.section.scripts-home')
</body>

</html>
