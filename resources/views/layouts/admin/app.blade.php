<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> @yield('title')</title>
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('backend/dist/style/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\fontawesome-free-6.2.1\css\all.css') }}">


    {{-- <link rel="stylesheet" href="{{ asset('assets/apexcharts/apexcharts.css') }}"> --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- CSS Libraries -->
    <script src="{{ asset('js/sweetalert2@11.6.15.all.min.js') }}"></script>

    {{-- library html5 --}}
    {{-- <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script> --}}
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    {{-- <script src="{{ asset('js/chart.min.js') }}"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <!-- Load Chart.js library -->
    {{-- <script src="path/to/chart.min.js"></script> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

</head>
<style type="text/css">
    .navbar-inverse {
        background-color: #20598f;

        font-size: 18px;
    }

    .btn-secondary {
        background-color: #20598f;
    }

    .red-icon {
        color: #cf7c10;
    }

    .border-bottom {
        background: #20598f;
    }

    .hidden-data {
        display: none;
    }

    .disabled {
        color: #bbb;
        background-color: #ddd;
        border-color: #aaa;
    }

    .status {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }

    .status h6 {
        margin: 0;
        margin-right: 10px;
        font-size: 16px;
    }

    .status .text-danger i,
    .status .text-warning {
        font-size: 20px;
        margin-right: 5px;
    }

    .status .text-success i {
        font-size: 18px;
        margin-right: 6px;
    }

    th {
        font-size: 14px;
        font-weight: bold;
    }

    td {
        font-size: 14px;
        font-weight: bold;
    }

    input[type="radio"]:disabled+label {
        color: blue;
    }

    .card-hidden {


        display: none;
    }

    /* CSS for slow-motion fade animation */
    #cardBody {
        opacity: 1;
        transition: opacity 1s ease-in-out;
        /* Increase the duration to slow down the fade animation */
    }

    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-in-out;
        /* Increase the duration to slow down the fade animation */
    }
</style>

<body class="sidebar-gone">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg navbar-inverse "></div>
            <!-- Navbar -->
            @include('layouts.admin.partials.navbar')
            <!-- Sidebar -->
            {{-- <div class="sidebar-bg navbar-inverse "></div> --}}
            @include('layouts.admin.partials.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>
                            @yield('judul')
                        </h1>

                    </div>
                </section>
                <section class="content"> <!-- Default box -->
                    @yield('content')
                    <!-- /.card -->
                </section>
            </div>
            @include('layouts.admin.partials.footer')
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>

        </div>
    </div>
    <!-- General JS Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}
    <script src="{{ asset('assets/js/validate.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    {{-- D:\coba2\daily_project\public\assets\js\jquery-3.3.1.min.js --}}
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    {{-- D:\coba2\daily_project\public\assets\js\popper.min.js
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    {{-- D:\coba2\daily_project\public\assets\js\bootstrap.min.js
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    {{-- D:\coba2\daily_project\public\assets\js\jquery.nicescroll.min.js
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"></script> --}}
    <!-- Tambahkan library Swiper -->
    {{-- D:\coba2\daily_project\public\assets\js\swiper-bundle.min.js
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}

    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Tambahkan stylesheet Swiper -->
    {{--
    D:\coba2\daily_project\public\assets\css\swiper-bundle.min.css
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> --}}
    <script src="{{ asset('assets/css/swiper-bundle.min.css') }}"></script>
    <script src="{{ asset('backend/dist/script/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    {{-- D:\coba2\daily_project\public\assets\js\moment.min.js
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
