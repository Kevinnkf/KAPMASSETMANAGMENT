<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('variables.appName') ? config('variables.appName') : 'KAI ESA' }}</title>
    <meta name="description"
        content="{{ config('variables.appDescription') ? config('variables.appDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.appKeyword') ? config('variables.appKeyword') : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}" />
    <style>
        .swal2-popup {
            font-size: 1rem !important;
        }

        .swal2-title {
            padding: 24px 24px 16px;
        }

        .swal2-container {
            z-index: 20000 !important;
        }

        .swal2-actions {
            margin: 20px 0 4px;
            gap: 8px;
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" alt="loader"
            class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/dist/images/logos/kai-esa-logo.svg') }}" alt="loader"
            class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    @yield('content')

    <!--  Import Js Files -->
    <script src="{{ asset('assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>

    <!-- Add On -->
    <script src="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        /**
         *
         * function call ajax
         * url string
         * type string
         * data object
         */
        async function callDataWithAjax(url, type, data) {
            var data = {
                "_token": "{{ csrf_token() }}",
                ...data
            }
            return await $.ajax({
                url: url,
                type: type,
                data: data,
            }).then(function(data) {
                return data;
            });
        }
    </script>
    @yield('scripts')
</body>

</html>
