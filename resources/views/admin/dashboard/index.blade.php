@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">User</h5>
                            <h2>{{ $users }}</h2>
                            <p>
                                <i class="fas fa-user-tie fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Alternatif</h5>
                            <h2>{{ $alternatif }}</h2>
                            <p>
                                <i class="fas fa-users fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Roles</h5>
                            <h2>{{ $roles }}</h2>
                            <p>
                                <i class="fas fa-cog fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <h2>{{ $users }}</h2>
                            <p>
                                <i class="fas fa-user-lock fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Kriteria</h5>
                            <h2>{{ $kriteria }}</h2>
                            <p>
                                <i class="fas fa-table fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Sub Kriteria</h5>
                            <h2>{{ $subKriteria }}</h2>
                            <p>
                                <i class="fas fa-table fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Hasil</h5>
                            <h2>{{ $hasil }}</h2>
                            <p>
                                <i class="fas fa-book-open fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Nilai</h5>
                            <h2>{{ $nilai }}</h2>
                            <p>
                                <i class="fas fa-pencil fa-2x"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
