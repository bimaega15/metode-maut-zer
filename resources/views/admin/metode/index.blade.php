@extends('layouts.admin')
@section('title')
    Perhitungan
@endsection
@section('content')
    <?php
    $isCreate = session()->get('userAcess.is_create');
    ?>
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @include('utils.session');
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i data-feather="settings"></i> <strong>Data Perhitungan</strong>
                                </div>
                                <div>
                                    {{ Breadcrumbs::render('perhitungan') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('admin.metode.partial.dataKriteria')
                            @include('admin.metode.partial.menghitungNilaiBobot')
                            @include('admin.metode.partial.matriksTernormalisasi')
                            @include('admin.metode.partial.minMax')
                            @include('admin.metode.partial.normalisasiMatriksKeputusan')
                            @include('admin.metode.partial.hasilPerkalianMatriks')
                            @include('admin.metode.partial.rankingMatriks')
                            <div class="text-center">
                                <div class="form-group">
                                    <button class="btn btn-primary form-control" data-bs-toggle="modal"
                                        data-bs-target="#modalForm">
                                        <i class="fas fa-paper-plane"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.metode.model');
@endsection

@push('js')
    @include('admin.metode.script');
@endpush
