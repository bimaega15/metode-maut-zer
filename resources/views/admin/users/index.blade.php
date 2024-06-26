@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('content')
    @push('css')
        <style>
            .photoviewer-modal {
                background-color: transparent;
                border: none;
                border-radius: 0;
                box-shadow: 0 0 6px 2px rgba(0, 0, 0, .3);
            }

            .photoviewer-header .photoviewer-toolbar {
                background-color: rgba(0, 0, 0, .5);
            }

            .photoviewer-stage {
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: rgba(0, 0, 0, .85);
                border: none;
            }

            .photoviewer-footer .photoviewer-toolbar {
                background-color: rgba(0, 0, 0, .5);
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }

            .photoviewer-header,
            .photoviewer-footer {
                border-radius: 0;
                pointer-events: none;
            }

            .photoviewer-title {
                color: #ccc;
            }

            .photoviewer-button {
                color: #ccc;
                pointer-events: auto;
            }

            .photoviewer-header .photoviewer-button:hover,
            .photoviewer-footer .photoviewer-button:hover {
                color: white;
            }
        </style>
    @endpush

    <?php
    $isCreate = session()->get('userAcess.is_create');
    ?>
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <i data-feather="user"></i> <strong>Data users</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if ($isCreate != null)
                                        <div class="mb-3">
                                            <a data-bs-toggle="modal" data-bs-target="#modalForm"
                                                href="{{ url('/admin/users/create') }}" class="btn btn-primary btn-add">
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
                                                        Username
                                                    </th>
                                                    <th scope="col">
                                                        Nama
                                                    </th>
                                                    <th scope="col">
                                                        Email
                                                    </th>
                                                    <th scope="col">
                                                        No. HP
                                                    </th>
                                                    <th scope="col" width="80px;">
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
    @include('admin.users.model')
@endsection

@push('js')
    @include('admin.users.script')
@endpush
