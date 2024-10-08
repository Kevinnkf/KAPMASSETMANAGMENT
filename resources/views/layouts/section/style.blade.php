<link rel="stylesheet" href="{{ asset('assets/dist/libs/select2/dist/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
<!-- Core Css -->
<link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />
<link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/custom-style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/dist/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">



<style>
    div.dataTables_scrollBody.dropdown-visible {
        overflow: visible !important;
    }

    .select2-container {
        width: auto !important;
        display: block;
    }

    .select2-search--inline {
        display: contents;
        /*this will make the container disappear, making the child the one who sets the width of the element*/
    }

    .nav-item-topbar {
        background-color: #f7f7f7;
        margin-right: 8px;
        padding: 0px 8px;
        border-radius: 6px;
        min-width: 150px;
    }

    .nav-item-topbar:hover {
        background-color: #CEDDED;
        margin-right: 8px;
        padding: 0px 8px;
        border-radius: 6px;
        color: #0B56A7;
    }

    .nav-item-topbar.active-topbar {
        background-color: #CEDDED;
        margin-right: 8px;
        padding: 0px 8px;
        border-radius: 6px;
        color: #0B56A7;
    }

    .nav-link-topbar {
        font-size: 14px;
        color: #818181;
    }

    .nav-link-topbar:hover {
        color: #0B56A7;
    }

    .nav-link-topbar.active-topbar {
        font-size: 14px;
        color: #0B56A7;
    }

    .dropdown-topbar {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content-topbar {
        display: none;
        position: absolute;
        background-color: #FFFFFF;
        box-shadow: 0px 2px 12px 0px rgba(0, 0, 0, 0.08);
        z-index: 1;
        border-radius: 6px;
        left: 0px;
        font-size: 14px;
    }

    /* Links inside the dropdown */
    .dropdown-content-topbar a {
        color: #818181;
        padding: 10px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content-topbar a:hover {
        background-color: #ddd;
    }

    .dropdown-content-topbar a:first-child:hover {
        border-radius: 6px 6px 0 0;
    }

    .dropdown-content-topbar a:last-child:hover {
        border-radius: 0 0 6px 6px;
    }

    /* Show the dropdown menu on hover */
    .dropdown-topbar:hover .dropdown-content-topbar {
        display: block;
    }
</style>

@yield('styles')
