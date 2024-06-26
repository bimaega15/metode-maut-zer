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
                        @include('utils.session')
                        <div class="card-header">
                            <i data-feather="settings"></i> <strong>Data Perhitungan</strong>
                        </div>
                        <div class="card-body">
                            @include('admin.metode.partial.hasilBagiSub')
                            @include('admin.metode.partial.normalisasiMatriks')
                            @include('admin.metode.partial.preferensi')
                            @include('admin.metode.partial.ranking')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    @include('admin.hasil.script');
@endpush
