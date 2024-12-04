@extends('layouts.app')

@section('styles')
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}" />

    <style>
        .img-carousel {
            height: 52vh;
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

        #card-info {
            padding: 32px 40px;
            border-radius: 12px;
            margin-bottom: 16px;
            box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.08);
        }

        .card-wo-border {
            cursor: pointer;
        }

        .card-wo-border:hover {
            cursor: pointer;
            transform: scale(1.01);
        }

        .card:hover {
            transform: scale(1.01);
        }

        .portal-menu {
            cursor: pointer;
        }

        .portal-menu:hover {
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')
    <?php
    // Sesuaikan timezone dengan lokasi
    date_default_timezone_set('Asia/Jakarta');
    ?>
    
    <div id="card-info">
        <h1 class="fw-bolder" style="font-size: 32px">{{ getSalam() }}, {{ $data['nama'] }}</h1>
        <p class="m-0">Selamat bekerja, Semoga hari mu menyenangkan.</p>
    </div>

    @include('dashboard.section.section-carousel')

    @include('dashboard.section.section-portal-menu')

    @include('dashboard.section.section-majalah-kontak')

    @include('dashboard.section.section-berita-terbaru')

    @include('dashboard.section.section-info-kesehatan')

    @include('dashboard.section.section-dokumen')

    @include('dashboard.section.modal-portal-menu')
@endsection

@section('scripts')
    <script src="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/dist/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000, // 5s
                autoplayHoverPause: true,
                center: true,
                items: 1,
                margin: 24,
                stagePadding: 20,
                autoWidth: true,
            })
        });
    </script>
@endsection