@extends('layouts.admin')
@section('title')
    Menu
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
                            <i data-feather="settings"></i> <strong>Data menu</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if ($isCreate != null)
                                        <div class="mb-3">
                                            <a data-bs-toggle="modal" data-bs-target="#modalForm"
                                                href="{{ url('/admin/menu/create') }}" class="btn btn-primary btn-add">
                                                <i data-feather="plus"></i> Tambah
                                            </a>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">
                                                        Icon
                                                    </th>
                                                    <th scope="col">
                                                        Menu
                                                    </th>
                                                    <th scope="col">
                                                        Link
                                                    </th>
                                                    <th scope="col" width="250px;">
                                                        <div class="text-center">
                                                            Sub menu
                                                        </div>
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
    @include('admin.menu.model')
@endsection

@push('js')
    @include('admin.menu.script')
@endpush
