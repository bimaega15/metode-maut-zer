<?php

use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\AlternatifController;
use App\Http\Controllers\Api\HasilController;
use App\Http\Controllers\Api\KonfigurasiController;
use App\Http\Controllers\Api\KriteriaController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\NilaiController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\SubKriteriaController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\KriteriaSubKriteriaController;
use App\Http\Controllers\Api\MetodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'users/', 'as' => 'users.'], function () {
//     Route::get('/', [UsersController::class, 'index'])->name('index');
//     Route::post('/', [UsersController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [UsersController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
// });

// Route::group(['prefix' => 'roles/', 'as' => 'roles.'], function () {
//     Route::get('/', [RolesController::class, 'index'])->name('index');
//     Route::post('/', [RolesController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [RolesController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [RolesController::class, 'delete'])->name('delete');
// });

// Route::group(['prefix' => 'konfigurasi/', 'as' => 'konfigurasi.'], function () {
//     Route::get('/', [KonfigurasiController::class, 'index'])->name('index');
//     Route::post('/', [KonfigurasiController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [KonfigurasiController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [KonfigurasiController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [KonfigurasiController::class, 'delete'])->name('delete');
// });

// Route::group(['prefix' => 'profile/', 'as' => 'profile.'], function () {
//     Route::get('/', [ProfileController::class, 'index'])->name('index');
//     Route::post('/', [ProfileController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [ProfileController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [ProfileController::class, 'delete'])->name('delete');
// });

// Route::group(['prefix' => 'menu/', 'as' => 'menu.'], function () {
//     Route::get('/', [MenuController::class, 'index'])->name('index');
//     Route::post('/', [MenuController::class, 'store'])->name('store');
//     Route::post('/{id}/subMenu', [MenuController::class, 'postSubMenu'])->name('postSubMenu');
//     Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [MenuController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [MenuController::class, 'delete'])->name('delete');
// });

// Route::group(['prefix' => 'access/', 'as' => 'access.'], function () {
//     Route::get('/', [AccessController::class, 'index'])->name('index');
//     Route::post('/', [AccessController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [AccessController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [AccessController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [AccessController::class, 'delete'])->name('delete');
//     Route::put('/updateAccess/{id}', [AccessController::class, 'updateAccess'])->name('updateAccess');
// });


// Route::group(['prefix' => 'kriteria/', 'as' => 'kriteria.'], function () {
//     Route::get('/', [KriteriaController::class, 'index'])->name('index');
//     Route::post('/', [KriteriaController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [KriteriaController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [KriteriaController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [KriteriaController::class, 'delete'])->name('delete');
//     Route::get('/autoNumber', [KriteriaController::class, 'autoNumber'])->name('autoNumber');
// });

// Route::group(['prefix' => 'subKriteria/', 'as' => 'subKriteria.'], function () {
//     Route::get('/', [SubKriteriaController::class, 'index'])->name('index');
//     Route::post('/', [SubKriteriaController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [SubKriteriaController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [SubKriteriaController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [SubKriteriaController::class, 'delete'])->name('delete');
//     Route::get('/autoNumber', [SubKriteriaController::class, 'autoNumber'])->name('autoNumber');
// });


// Route::group(['prefix' => 'alternatif/', 'as' => 'alternatif.'], function () {
//     Route::get('/', [AlternatifController::class, 'index'])->name('index');
//     Route::post('/', [AlternatifController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [AlternatifController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [AlternatifController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [AlternatifController::class, 'delete'])->name('delete');
// });


// Route::group(['prefix' => 'nilai/', 'as' => 'nilai.'], function () {
//     Route::get('/', [NilaiController::class, 'index'])->name('index');
//     Route::post('/', [NilaiController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [NilaiController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [NilaiController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [NilaiController::class, 'delete'])->name('delete');
// });

// Route::group(['prefix' => 'kriteriaSubKriteria/', 'as' => 'kriteriaSubKriteria.'], function () {
//     Route::get('/', [KriteriaSubKriteriaController::class, 'index'])->name('index');
//     Route::post('/', [KriteriaSubKriteriaController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [KriteriaSubKriteriaController::class, 'edit'])->name('edit');
//     Route::put('/edit/{id}', [KriteriaSubKriteriaController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [KriteriaSubKriteriaController::class, 'delete'])->name('delete');
// });


// Route::group(['prefix' => 'metode/', 'as' => 'metode.'], function () {
//     Route::get('/', [MetodeController::class, 'index'])->name('index');
// });

// Route::group(['prefix' => 'hasil/', 'as' => 'hasil.'], function () {
//     Route::get('/', [HasilController::class, 'index'])->name('index');
// });
