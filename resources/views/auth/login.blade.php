@extends('layouts.auth')

@section('title', 'Login page')


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
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    @include('utils.session')
                    <div class="card-body">
                        <div class="authent-logo">
                            <img src="{{ asset('/storage/upload/konfigurasi/' . $getKonfigurasi->logo_konfigurasi) }}"
                                alt="{{ $getKonfigurasi->logo_konfigurasi }}" height="80">
                        </div>
                        <div class="authent-text">
                            <p>{{ $getKonfigurasi->nama_konfigurasi }}</p>
                            <p>Please Sign-in to your account.</p>
                        </div>

                        <form method="post" action="{{ url('login') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('username')
                                        border border-danger
                                    @enderror"
                                        id="floatingInput" placeholder="Username..." name="username"
                                        value="{{ old('username') }}">
                                    <label for="floatingInput">Username</label>
                                </div>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password"
                                        class="form-control @error('password')
                                    border border-danger
                                @enderror"
                                        id="floatingPassword" placeholder="Password..." name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Check me out</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-info m-b-xs">
                                    Sign In
                                </button>
                            </div>
                        </form>
                        <div class="authent-reg">
                            <p>Not registered? <a href="{{ url('register') }}">Create an account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
