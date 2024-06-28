@extends('layouts.admin')
@section('title')
    Penilaian
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
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i data-feather="settings"></i> <strong>Data Penilaian</strong>
                                </div>
                                <div>
                                    {{ Breadcrumbs::render('penilaian') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">
                                                        NIP
                                                    </th>
                                                    <th scope="col">
                                                        Nama
                                                    </th>
                                                    <th scope="col">
                                                        Email
                                                    </th>
                                                    <th scope="col">
                                                        Alamat
                                                    </th>
                                                    <th scope="col">
                                                        NO. HP
                                                    </th>
                                                    <th scope="col">
                                                        Jenis Kelamin
                                                    </th>
                                                    <th scope="col" width="120px;">
                                                        Gambar
                                                    </th>
                                                    <th scope="col">
                                                        <div class="text-center">
                                                            Actions
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.kriteriaSubkriteria.model')
@endsection

@push('js')
    <script class="data_subkriteria" data-json="{{ $jsonSubKriteria }}"></script>
    @include('admin.kriteriaSubkriteria.script')
@endpush
