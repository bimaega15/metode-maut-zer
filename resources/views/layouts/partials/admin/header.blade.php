<?php
$getKonfigurasi = Check::getKonfigurasi();
$myProfile = Check::getUserProfile();
?>
<div class="page-header">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="" id="navbarNav">
            <ul class="navbar-nav" id="leftNav">
                <li class="nav-item">
                    <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/konfigurasi') }}">Settings</a>
                </li>
            </ul>
        </div>
        <div class="logo">
            <a href="{{ url('/admin/home') }}">
                <img class="rounded" src="{{ asset('storage/upload/konfigurasi/' . $getKonfigurasi->logo_konfigurasi) }}"
                    height="35" />
            </a>
        </div>
        <div class="" id="headerNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><img
                            src="{{ asset('storage/upload/profile/' . $myProfile->profile->gambar_profile) }}"
                            alt=""></a>
                    <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}"><i
                                data-feather="user"></i>Profile</a>
                        <div class="dropdown-divider"></div>
                        @if ($myProfile->roles[0]->nama_roles == 'Admin')
                            <a class="dropdown-item" href="{{ url('/admin/konfigurasi') }}"><i
                                    data-feather="settings"></i>Pengaturan</a>
                        @endif
                        <a class="dropdown-item btn-logout" href="{{ url('/logout') }}"><i
                                data-feather="log-out"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
