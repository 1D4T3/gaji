<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\bagian_karyawanController;
use App\Http\Controllers\jabatan_karyawanController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth',]], function () {
    //Resource Route-nya
    Route::resource('pengguna', UserController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('bagian',BagianController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('presensi', PresensiController::class);
    Route::resource('penggajian', PenggajianController::class);
    Route::resource('bagian_karyawan', bagian_karyawanController::class);
    Route::resource('jabatan_karyawan', jabatan_karyawanController::class);


    //Route Pemanggilan
    Route::get('get-jabatan', action:[JabatanController::class,'getJabatan'])->name('get.jabatan');
    Route::get('get-lokasi', action:[LokasiController::class,'getLokasi'])->name('get.lokasi');
    Route::get('get-bagian', action:[BagianController::class,'getBagian'])->name('get.bagian');
    Route::get('get-karyawan', action:[KaryawanController::class,'getKaryawan'])->name('get.karyawan');
    Route::get('get-presensi', action:[PresensiController::class,'getPresensi'])->name('get.presensi');
    Route::get('get-penggajian', action:[PenggajianController::class,'getPenggajian'])->name('get.penggajian');
    Route::get('get-bagian', action:[BagianController::class,'getBagian'])->name('get.bagian');
    Route::get('get-bagian_karyawan', action:[bagian_karyawanController::class,'getbagian_karyawan'])->name('get.bagian_karyawan');
    Route::get('get-jabatan_karyawan', action:[jabatan_karyawanController::class,'getjabatan_karyawan'])->name('get.jabatan_karyawan');





    //Route PDF, Excel, & Grafik
    //Jabatan
    Route::get('jabatan._pdf', [JabatanController::class, 'printPdf'])->name('jabatan._pdf');
    Route::get('jabatan._excel', [JabatanController::class, 'exportExcel'])->name('jabatan._excel');
    Route::get('jabatan.chart', [JabatanController::class, 'grafikJabatan'])->name('jabatan.chart');
    Route::get('get-grafik', [JabatanController::class, 'getGrafik'])->name('get.grafik.jabatan');

    //Lokasi
    Route::get('lokasi._pdf', [LokasiController::class, 'printPdf'])->name('lokasi._pdf');
    Route::get('lokasi._excel', [LokasiController::class, 'exportExcel'])->name('lokasi._excel');
    Route::get('lokasi.chart', [LokasiController::class, 'grafikLokasi'])->name('lokasi.chart');
    Route::get('get-grafik-lokasi', [LokasiController::class,'getGrafik'])->name('get.grafik.lokasi');

    //Bagian
    Route::get('bagian._pdf', [BagianController::class, 'printPdf'])->name('bagian._pdf');
    Route::get('bagian._excel', [BagianController::class, 'exportExcel'])->name('bagian._excel');
    Route::get('bagian.chart', [BagianController::class, 'grafikBagian'])->name('bagian.chart');
    Route::get('get-grafik-bagian', [BagianController::class,'getGrafik'])->name('get.grafik.bagian');

    //Karyawan
    Route::get('karyawan._pdf', [KaryawanController::class, 'printPdf'])->name('karyawan._pdf');
    Route::get('karyawan._excel', [KaryawanController::class, 'exportExcel'])->name('karyawan._excel');
    Route::get('karyawan.chart', [KaryawanController::class, 'grafikKaryawan'])->name('karyawan.chart');
    Route::get('get-grafik-karyawan', [KaryawanController::class,'getGrafik'])->name('get.grafik.karyawan');

    //Presensi
    Route::get('presensi._pdf', [PresensiController::class, 'printPdf'])->name('presensi._pdf');
    Route::get('presensi._excel', [PresensiController::class, 'exportExcel'])->name('presensi._excel');
    Route::get('presensi.chart', [PresensiController::class, 'grafikPresensi'])->name('presensi.chart');
    Route::get('get-grafik-presensi', [PresensiController::class,'getGrafik'])->name('get.grafik.presensi');

    //Penggajian
    Route::get('penggajian._pdf', [PenggajianController::class, 'printPdf'])->name('penggajian._pdf');
    Route::get('penggajian._excel', [PenggajianController::class, 'exportExcel'])->name('penggajian._excel');
    Route::get('penggajian.chart', [PenggajianController::class, 'grafikPenggajian'])->name('penggajian.chart');
    Route::get('get-grafik-penggajian', [PenggajianController::class,'getGrafik'])->name('get.grafik.penggajian');

    //Bagian Karyawan
    Route::get('bagian_karyawan._pdf', [bagian_karyawanController::class, 'printPdf'])->name('bagian_karyawan._pdf');
    Route::get('bagian_karyawan._excel', [bagian_karyawanController::class, 'exportExcel'])->name('bagian_karyawan._excel');
    Route::get('bagian_karyawan.chart', [bagian_karyawanController::class, 'grafikBagianKaryawan'])->name('bagian_karyawan.chart');
    Route::get('get-grafik-bagian_karyawan', [bagian_karyawanController::class,'getGrafik'])->name('get.grafik.bagian_karyawan');

    //Jabatan Karyawan
    Route::get('jabatan_karyawan._pdf', [jabatan_karyawanController::class, 'printPdf'])->name('jabatan_karyawan._pdf');
    Route::get('jabatan_karyawan._excel', [jabatan_karyawanController::class, 'exportExcel'])->name('jabatan_karyawan._excel');
    Route::get('jabatan_karyawan.chart', [jabatan_karyawanController::class, 'grafikJabatanKaryawan'])->name('jabatan_karyawan.chart');
    Route::get('get-grafik-jabatan_karyawan', [jabatan_karyawanController::class,'getGrafik'])->name('get.grafik.jabatan_karyawan');


});
