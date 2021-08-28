<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;


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

// kalo laravel pertama kali dibuka
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('halo');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);
});


Route::group(['prefix' => 'operator', 'middleware' => ['auth']], function () {
    Route::resource('pasien', PasienController::class);
});

// Route::group(['middleware' => ['auth', 'is_admin:1']], function () {
// Route::group(['middleware' => ['auth']], function () {

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    // Route::get('/admin/provinsi/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
    // Route::get('/admin/provinsi/edit', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
    // Route::get('/admin/provinsi/show', [ProvinsiController::class, 'show'])->name('provinsi.show');
    // Route::get('/admin/provinsi/index', [ProvinsiController::class, 'index'])->name('provinsi.index');
    // Route::get('/admin/provinsi/destroy', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');
    // Route::post('/admin/provinsi/store', [ProvinsiController::class, 'store'])->name('provinsi.store');
    // Route::get('/admin/provinsi/update', [ProvinsiController::class, 'update'])->name('provinsi.update');

    // Route::get('/admin/kota/index', [KotaController::class, 'index'])->name('kota.index');
    // Route::get('/admin/kota/show', [KotaController::class, 'show'])->name('kota.show');
    // Route::get('/admin/kota/edit', [KotaController::class, 'edit'])->name('kota.edit');
    // Route::get('/admin/kota/create', [KotaController::class, 'create'])->name('kota.create');
    // Route::get('/admin/kota/destroy', [KotaController::class, 'destroy'])->name('kota.destroy');
    // Route::post('/admin/kota/store', [KotaController::class, 'store'])->name('kota.store');
    // Route::get('/admin/kota/update', [KotaController::class, 'update'])->name('kota.update');

    // Route::get('/admin/kecamatan/index', [KecamatanController::class, 'index'])->name('kecamatan.index');
    // Route::get('/admin/kecamatan/show', [KecamatanController::class, 'show'])->name('kecamatan.show');
    // Route::get('/admin/kecamatan/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    // Route::get('/admin/kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
    // Route::get('/admin/kecamatan/destroy', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');
    // Route::post('/admin/kecamatan/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
    // Route::get('/admin/kecamatan/update', [KecamatanController::class, 'update'])->name('kecamatan.update');

    // Route::get('/admin/kelurahan/index', [KelurahanController::class, 'index'])->name('kelurahan.index');
    // Route::get('/admin/kelurahan/show', [KelurahanController::class, 'show'])->name('kelurahan.show');
    // Route::get('/admin/kelurahan/edit', [KelurahanController::class, 'edit'])->name('kelurahan.edit');
    // Route::get('/admin/kelurahan/create', [KelurahanController::class, 'create'])->name('kelurahan.create');
    // Route::get('/admin/kelurahan/destroy', [KelurahanController::class, 'destroy'])->name('kelurahan.destroy');
    // Route::post('/admin/kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store');
    // Route::get('/admin/kelurahan/update', [KelurahanController::class, 'update'])->name('kelurahan.update');
// });

// Route::group(['middleware' => ['auth']], function () {
//     // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

//     // Route::get('/pasien/index', [PasienController::class, 'index'])->name('pasien.index');
//     // Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
//     // Route::get('/pasien/edit', [PasienController::class, 'edit'])->name('pasien.edit');
//     // Route::get('/pasien/show', [PasienController::class, 'show'])->name('pasien.show');
//     // Route::get('/pasien/destroy', [PasienController::class, 'destroy'])->name('pasien.destroy');
//     // Route::p('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
//     // Route::get('/pasien/update', [PasienController::class, 'update'])->name('pasien.update');
// });
