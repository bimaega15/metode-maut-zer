<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KonfigurasiController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\KriteriaSubKriteriaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MetodeController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SubKriteriaController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/clear', function () {
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});


Route::group(['middleware' => ['checkAlreadyLogin']], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
});


Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['checkNotLogin']], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home.index');

    Route::resource('profile', ProfileController::class);

    Route::resource('users', UsersController::class);

    Route::resource('menu', MenuController::class)->except('show');
    Route::post('menu/{menu}/postSubMenu', [MenuController::class, 'postSubMenu'])->name('menu.postSubmenu');
    Route::get('menu/showMenu', [MenuController::class, 'showMenu'])->name('menu.showMenu');

    Route::resource('access', AccessController::class)->except('show');
    Route::get('access/managementMenu', [AccessController::class, 'managementMenu'])->name('access.managementMenu');
    Route::get('access/managementMenuById', [AccessController::class, 'managementMenuById'])->name('access.managementMenuById');
    Route::post('access/updateAccess', [AccessController::class, 'updateAccess'])->name('access.updateAccess');

    Route::resource('roles', RolesController::class);

    Route::resource('konfigurasi', KonfigurasiController::class);

    Route::resource('alternatif', AlternatifController::class);

    Route::resource('kriteria', KriteriaController::class)->except('show');
    Route::get('/kriteria/autoNumber', [KriteriaController::class, 'autoNumber'])->name('kriteria.autoNumber');

    Route::resource('subKriteria', SubKriteriaController::class)->except('show');
    Route::get('/subKriteria/autoNumber', [SubKriteriaController::class, 'autoNumber'])->name('subKriteria.autoNumber');

    Route::resource('nilai', NilaiController::class)->except('show');

    Route::get('/penilaian', [KriteriaSubKriteriaController::class, 'index'])->name('penilaian.index');
    Route::post('/penilaian/store', [KriteriaSubKriteriaController::class, 'store'])->name('penilaian.store');
    Route::put('/penilaian/{id}/update', [KriteriaSubKriteriaController::class, 'update'])->name('penilaian.update');
    Route::get('/penilaian/{id}/edit', [KriteriaSubKriteriaController::class, 'edit'])->name('penilaian.edit');

    Route::get('/perhitungan', [MetodeController::class, 'index'])->name('metode.index');
    Route::post('/perhitungan', [MetodeController::class, 'store'])->name('metode.store');

    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
    Route::get('/hasil/{id}/detail', [HasilController::class, 'detail'])->name('hasil.detail');
    Route::delete('/hasil/{id}/destroy', [HasilController::class, 'destroy'])->name('hasil.destroy');
});
