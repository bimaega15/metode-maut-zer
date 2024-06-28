<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.home.index'));
});

// Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('My Profile', route('admin.profile.index'));
});

// Hasil
Breadcrumbs::for('hasil', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Hasil', route('admin.hasil.index'));
});

// hasil detail
Breadcrumbs::for('hasilDetail', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('hasil');
    $trail->push('Detail Nilai', url('admin/hasil/' . $id . '/detail'));
});


// penilaian
Breadcrumbs::for('penilaian', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Penilaian', route('admin.penilaian.index'));
});

// perhitungan
Breadcrumbs::for('perhitungan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Perhitungan', url('admin/perhitungan'));
});
// access
Breadcrumbs::for('access', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Access', url('admin/access'));
});
// konfigurasi
Breadcrumbs::for('konfigurasi', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Konfigurasi', url('admin/konfigurasi'));
});
// users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Users', url('admin/users'));
});
// role
Breadcrumbs::for('role', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('role', url('admin/role'));
});
// menu
Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Menu', url('admin/menu'));
});
// sub kriteria
Breadcrumbs::for('subKriteria', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Sub Kriteria', url('admin/subKriteria'));
});
// kriteria
Breadcrumbs::for('kriteria', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kriteria', url('admin/kriteria'));
});
// nilai
Breadcrumbs::for('nilai', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Nilai', url('admin/nilai'));
});
