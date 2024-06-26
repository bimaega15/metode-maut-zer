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

    <link rel="shortcut icon" href="{{ asset('upload/konfigurasi/' . $getKonfigurasi->logo_konfigurasi) }}"
        type="image/x-icon">

    <!-- Theme Styles -->
    <link href="{{ asset('backend/circl/theme') }}/assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('backend/circl/theme') }}/assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatable/DataTables-1.13.1/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/animate.css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('library/owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link href="{{ asset('library/photoviewer-master') }}/dist/photoviewer.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library/select2-develop/dist/css/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('library/select2-bootstrap-5-theme-1.3.0/dist/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css') }}">
    @stack('css')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div class="page-container">
        @include('layouts.partials.admin.header')
        @include('layouts.partials.admin.sidebar')

        @yield('content')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalLogout" aria-labelledby="modalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogoutLabel">Form Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="modalLogout" class="form-label">Apakah anda yakin ingin logout?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                data-feather="x"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i data-feather="send"></i>
                            Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('backend/circl/theme') }}/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('backend/circl/theme') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('backend/circl/theme') }}/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>

    <script src="{{ asset('backend/circl/theme') }}/assets/js/main.min.js"></script>
    <script src="{{ asset('library/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('library/datatable/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatable/DataTables-1.13.1/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('library/owl-carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('library/photoviewer-master') }}/dist/photoviewer.js"></script>
    <script src="{{ asset('library/select2-develop/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-logout', function(e) {
                e.preventDefault();
                $('#modalLogout').modal('show');
            })
        })
    </script>

    @stack('js')
</body>

</html>
