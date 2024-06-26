<?php

use App\Http\Controllers\Admin\AdminGuruBkController;
use App\Http\Controllers\Admin\AdminJurusanController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminSiswaController;
use App\Http\Controllers\Admin\AdminUserRegistrasiController;
use App\Http\Controllers\Admin\AdminWaliKelasController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\GuruBk\GuruBkBimbinganOnlineController;
use App\Http\Controllers\GuruBk\GuruBkJadwalBimbinganController;
use App\Http\Controllers\GuruBk\GuruBkLaporanController;
use App\Http\Controllers\GuruBk\GuruBkSiswaBimbinganController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Registrasi\RegistrasiController;
use App\Http\Controllers\Siswa\SiswaBimbinganOnlineController;
use App\Http\Controllers\Siswa\SiswaBiodataController;
use App\Http\Controllers\Siswa\SiswaMengajukanBimbinganController;
use App\Http\Controllers\WaliKelas\WaliKelasLaporanController;
use App\Http\Controllers\WaliKelas\WaliKelasSiswaController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;

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

// Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi/store', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::get('/getkelasbyjurusan', [RegistrasiController::class, 'getKelasByJurusan']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::post('/setting-profile', [DashboardController::class, 'settingprofile']);
    Route::post('/setting-email', [DashboardController::class, 'settingemail']);
    Route::post('/setting-password', [DashboardController::class, 'settingpassword']);
    Route::post('/setting-gambar', [DashboardController::class, 'settinggambar']);
    Route::post('/hapus-gambar', [DashboardController::class, 'hapusgambar']);

    Route::get('/generate-pdf/siswa', [DashboardController::class, 'generatepdfwalikelas']);

    // Admin
    Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
        Route::resource('data-jurusan', AdminJurusanController::class);

        // Data Kelas
        Route::get('/data-kelas', [AdminKelasController::class, 'index'])->name('data-kelas.index');
        Route::get('/data-kelas/show/{id}', [AdminKelasController::class, 'show'])->name('data-kelas.show');
        Route::get('/data-kelas/create/{id}', [AdminKelasController::class, 'create'])->name('data-kelas.create');
        Route::post('/data-kelas/store', [AdminKelasController::class, 'store'])->name('data-kelas.store');
        Route::get('/data-kelas/edit/{id}', [AdminKelasController::class, 'edit'])->name('data-kelas.edit');
        Route::post('/data-kelas/destroy/{id}', [AdminKelasController::class, 'destroy'])->name('data-kelas.destroy');
        Route::post('/data-kelas/update/{id}', [AdminKelasController::class, 'update'])->name('data-kelas.update');

        // Wali Kelas
        Route::get('data-walikelas', [AdminWaliKelasController::class, 'index'])->name('data-walikelas.index');
        Route::get('data-walikelas/showkelas/{id}', [AdminWaliKelasController::class, 'showkelas'])->name('data-walikelas.showkelas');
        Route::get('data-walikelas/show/{id}', [AdminWaliKelasController::class, 'show'])->name('data-walikelas.show');
        Route::get('data-walikelas/create/{id}', [AdminWaliKelasController::class, 'create'])->name('data-walikelas.create');
        Route::get('data-walikelas/edit/{id}', [AdminWaliKelasController::class, 'edit'])->name('data-walikelas.edit');
        Route::post('data-walikelas/store', [AdminWaliKelasController::class, 'store'])->name('data-walikelas.store');
        Route::post('data-walikelas/update/{id}', [AdminWaliKelasController::class, 'update'])->name('data-walikelas.update');
        Route::post('data-walikelas/destroy/{id}', [AdminWaliKelasController::class, 'destroy'])->name('data-walikelas.destroy');

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
        Route::get('/layanan-online', [GuruBkBimbinganOnlineController::class, 'index'])->name('layanan-online.index');
        Route::get('/layanan-online/show/{id}', [GuruBkBimbinganOnlineController::class, 'show'])->name('layanan-online.show');
        Route::post('/layanan-online/store', [GuruBkBimbinganOnlineController::class, 'store'])->name('layanan-online.store');
        Route::get('/pesan-gurubk', [GuruBkBimbinganOnlineController::class, 'pesanGuruBk']);
    });

    // Siswa
    Route::group(['middleware' => [CekLevel::class . ':Siswa']], function () {
        Route::resource('mengajukan-bimbingan', SiswaMengajukanBimbinganController::class);
        Route::resource('bimbingan-online', SiswaBimbinganOnlineController::class);

        // Siswa
        Route::get('/biodata-siswa', [SiswaBiodataController::class, 'index'])->name('biodata-siswa.index');
        Route::get('/biodata-siswa/create', [SiswaBiodataController::class, 'create'])->name('biodata-siswa.create');
        Route::get('/biodata-siswa/edit/{id}', [SiswaBiodataController::class, 'edit'])->name('biodata-siswa.edit');
        Route::post('/biodata-siswa/store', [SiswaBiodataController::class, 'store'])->name('biodata-siswa.store');
        Route::post('/biodata-siswa/update/{id}', [SiswaBiodataController::class, 'update'])->name('biodata-siswa.update');
        Route::get('/getjurusanbysiswa', [SiswaBiodataController::class, 'getJurusanBySiswa']);

        // jQuery
        Route::post('/jquery-gurubk', [SiswaMengajukanBimbinganController::class, 'jqueryGuruBk']);
        Route::get('/bimbingan-getgurubkbydate', [SiswaMengajukanBimbinganController::class, 'getGuruBkByDate']);
        Route::get('/get-jadwal-bimbingan/{id}', [SiswaMengajukanBimbinganController::class, 'getJadwalBimbingan']);
    });

    // Wali Kelas
    Route::group(['middleware' => [CekLevel::class . ':Wali Kelas']], function () {
        Route::resource('laporan-walikelas', WaliKelasLaporanController::class);
        Route::get('siswa-walikelas', [WaliKelasSiswaController::class, 'index'])->name('siswa-walikelas.index');
    });
});
