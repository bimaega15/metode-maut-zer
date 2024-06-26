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

            .form-my-profile tr {
                line-height: 30px;
            }
        </style>
    @endpush
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <i data-feather="user"></i> <strong>My profile</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <span>
                                                <i data-feather="edit-2"></i>
                                            </span> My profile
                                        </div>
                                        <div class="card-body">
                                            <div id="load_image_profile_html"></div>
                                            <div style="height: 10px;"></div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td>Username</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="username_html"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="roles_id_html">

                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>
                                                    <i data-feather="edit-2"></i> Form
                                                </span>
                                                <a data-bs-toggle="modal" data-bs-target="#modalForm" href="#"
                                                    class="btn btn-primary btn-edit">
                                                    <i data-feather="edit"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table style="width: 100%;" class="form-my-profile">
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td><span class="nama_profile_html"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td><span class="email_profile_html"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td><span class="alamat_profile_html"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. HP</td>
                                                        <td>:</td>
                                                        <td><span class="nohp_profile_html"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis kelamin</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="jenis_kelamin_profile_html"></span>
                                                        </td>
                                                    </tr>
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
        </div>
    </div>
    @include('admin.profile.model')
@endsection

@push('js')
    @include('admin.profile.script')
@endpush
