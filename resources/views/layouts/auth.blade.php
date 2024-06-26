<?php
$getKonfigurasi = Check::getKonfigurasi();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $getKonfigurasi->deskripsi_konfigurasi }}">
    <meta name="keywords" content="Sistem pakar CF, Sistem pakar BC">
    <meta name="author" content="{{ $getKonfigurasi->created_konfigurasi }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/circl/theme') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend/circl/theme') }}/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('backend/circl/theme') }}/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('backend/circl/theme') }}/assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('backend/circl/theme') }}/assets/css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('upload/konfigurasi/' . $getKonfigurasi->logo_konfigurasi) }}"
        type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('library/owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/sweetalert2/dist/sweetalert2.min.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>


<body class="login-page">
    @yield('content')


    <!-- Javascripts -->
    <script src="{{ asset('backend/circl/theme') }}/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('backend/circl/theme') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('backend/circl/theme') }}/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('backend/circl/theme') }}/assets/js/main.min.js"></script>
    <script src="{{ asset('library/owl-carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>

    @stack('js')
</body>

</html>
