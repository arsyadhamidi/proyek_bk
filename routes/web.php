<?php

use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminSiswaController;
use App\Http\Controllers\Admin\AdminGuruBkController;
use App\Http\Controllers\Admin\AdminJurusanController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\AdminWaliKelasController;
use App\Http\Controllers\Admin\AdminUserRegistrasiController;
use App\Http\Controllers\GuruBk\GuruBkSiswaBimbinganController;
use App\Http\Controllers\GuruBk\GuruBkJadwalBimbinganController;
use App\Http\Controllers\GuruBk\GuruBkLaporanController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Siswa\SiswaMengajukanBimbinganController;
use App\Http\Controllers\WaliKelas\WaliKelasLaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Landing
Route::get('/', [LandingController::class, 'index']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-action', [LoginController::class, 'authenticate']);
Route::get('/logout-action', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::post('/setting-profile', [DashboardController::class, 'settingprofile']);
    Route::post('/setting-password', [DashboardController::class, 'settingpassword']);
    Route::post('/setting-gambar', [DashboardController::class, 'settinggambar']);
    Route::post('/hapus-gambar', [DashboardController::class, 'hapusgambar']);

    // Admin
    Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
        Route::resource('data-jurusan', AdminJurusanController::class);
        Route::resource('data-kelas', AdminKelasController::class);
        Route::resource('data-walikelas', AdminWaliKelasController::class);
        Route::resource('data-gurubk', AdminGuruBkController::class);
        Route::resource('data-siswa', AdminSiswaController::class);
        Route::get('/data-siswa/kelas/{id}', [AdminSiswaController::class, 'showkelas'])->name('siswa-kelas.show');
        Route::resource('user-registrasi', AdminUserRegistrasiController::class);

        // Jquery
        Route::post('/jquery-jurusan', [AdminWaliKelasController::class, 'jqueryJurusan']);
        Route::post('/jquery-siswa', [AdminSiswaController::class, 'jquerySiswa']);
    });

    // Guru BK
    Route::group(['middleware' => [CekLevel::class . ':Guru BK']], function () {
        Route::resource('buat-jadwal', GuruBkJadwalBimbinganController::class);
        Route::resource('bimbingan-siswa', GuruBkSiswaBimbinganController::class);
        Route::resource('gurubk-laporan', GuruBkLaporanController::class);
    });

    // Siswa
    Route::group(['middleware' => [CekLevel::class . ':Siswa']], function () {
        Route::resource('mengajukan-bimbingan', SiswaMengajukanBimbinganController::class);

        // jQuery
        Route::post('/jquery-gurubk', [SiswaMengajukanBimbinganController::class, 'jqueryGuruBk']);
    });

    // Wali Kelas
    Route::group(['middleware' => [CekLevel::class . ':Wali Kelas']], function () {
        Route::resource('laporan-walikelas', WaliKelasLaporanController::class);
    });
});
