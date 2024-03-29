<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | fabcart</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="keyword" content="@yield('meta_tags')">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    {{-- bootstrap core css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- material design bootstrap --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/mdb.min.css') }}">
    {{-- your custom style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- CSS ALERTIFY-->
    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/alertify.min.css') }}" />


</head>

<body>

    @include('layouts.inc.front-navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.inc.front-footer')

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> {{-- custom js --}}
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

    {{-- ALERTIFY JS BOOTSTRAP --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> --}}
    <script src="{{ asset('assets/js/alertify.min.js') }}"></script>
    <script>
        @error('email')
        $(document).ready(function(){
            $('#LoginModal').modal('show');
        });

        @enderror
        @if (session('status'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("{{ session('status') }}");
        @endif
    </script>
    {{-- END ALERTIFY JS BOOTSTRAP --}}

    {{-- <script>
        alertify.success('Success notification message.');
    </script> --}}
    <!-- Plugin file -->
    {{-- <script src="./js/addons/datatables.min.js"></script> --}}
</body>

</html>
