@extends('layouts.auth')

@section('title', 'Register page')


@section('content')

    <?php
    $getKonfigurasi = Check::getKonfigurasi();
    
    ?>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-10">
                <div class="card login-box-container">
                    <div class="card-body">
                        <div class="authent-logo">
                            <img src="{{ asset('/storage/upload/konfigurasi/' . $getKonfigurasi->logo_konfigurasi) }}"
                                alt="{{ $getKonfigurasi->logo_konfigurasi }}" height="80">
                        </div>
                        <div class="authent-text">
                            <p>{{ $getKonfigurasi->nama_konfigurasi }}</p>
                            <p>Register to your account.</p>
                        </div>

                        <form method="post" action="{{ url('register/store') }}" class="form-submit">
                            <div class="row" style="height: 70vh;">
                                <div class="col-lg-12">
                                    <div class="owl-carousel owl-theme">
                                        @include('auth.item.account')
                                        @include('auth.item.biodata')
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="authent-reg">
                            <p>Already account ? <a href="{{ url('/') }}">Login account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        @include('auth.script')
    @endpush
@endsection
