<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') | fabcart - Admin Panel</title>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    {{-- bootstrap core css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- material design bootstrap --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/mdb.min.css') }}">
    {{-- your custom style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .sidebar-fixed {
            height: 100vh;
            width: 270px;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            z-index: 1050;
            background-color: #fff;
            padding: 1.5rem;
            padding-top: 0;
        }

        .sidebar-fixed .list-group .active {
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }

        .sidebar-fixed .logo-wrapper {
            padding: 2.5rem;
        }

        .sidebar-fixed .logo-wrapper img {
            max-height: 50px;
        }

        @media (min-width: 1200px) {

            .navbar,
            .page-footer,
            main {
                padding-left: 270px;
            }
        }

        @media (max-width: 1199.98px) {
            .sidebar-fixed {
                display: none;
            }
        }

        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body>
    {{-- main navigation --}}
    <div class="container-for-admin">
        <header>
            @include('layouts.inc.adminnavbar')
            @include('layouts.inc.adminsidebar')
        </header>
        <main class="pt-5 mx-lg-5">
            @yield('content')
        </main>

        @include('layouts.inc.adminfooter')
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <!-- Plugin file -->
    <script src="./js/addons/datatables.min.js"></script>
</body>

</html>
