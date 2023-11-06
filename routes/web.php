<?php

use App\Http\Controllers\StafController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::prefix('select2')->group(function(){
    route::get('jabatan',[App\Http\Controllers\Select2Controller::class, 'jabatan'])->name('s2.jabatan');
    route::get('nokk',[App\Http\Controllers\Select2Controller::class, 'nokk'])->name('s2.nokk');
    route::get('statuskeluarga',[App\Http\Controllers\Select2Controller::class, 'statuskeluarga'])->name('s2.statuskeluarga');
    route::get('surat',[App\Http\Controllers\Select2Controller::class, 'surat'])->name('s2.surat');
});

Route::prefix('tentang-kami')->group(function () {
    Route::get('profil', [\App\Http\Controllers\TentangController::class, 'indexprofil'])->name('profil');
    Route::get('visi-misi', [\App\Http\Controllers\TentangController::class, 'indexvisimisi'])->name('visimisi');
    Route::get('struktur-organisasi', [\App\Http\Controllers\TentangController::class, 'indexstruktur'])->name('struktur');
});

Route::prefix('pelayanan')->group(function(){
    Route::prefix('surat-keterangan')->group(function(){
        // Route::get('', [\App\Http\Controllers\PelayananController::class, 'indexsurket'])->name('surat-keterangan');
        Route::get('', [\App\Http\Controllers\PelayananController::class, 'carinik'])->name('cari-nik');
        Route::get('form-pengajuan', [\App\Http\Controllers\PelayananController::class, 'indexpengajuan'])->name('pengajuan');
        Route::get('telusuri-pengajuan', [\App\Http\Controllers\PelayananController::class, 'indexcekpengajuan'])->name('indexcekpengajuan');
        Route::get('cekpengajuan', [\App\Http\Controllers\PelayananController::class, 'cekpengajuan'])->name('cekpengajuan');
        // Route::get('form-pengajuan-eksternal', [\App\Http\Controllers\PelayananController::class, 'pengajuaneksternal'])->name('pengajuan-eksternal');
        Route::post('store', [\App\Http\Controllers\PelayananController::class, 'store'])->name('pengajuan.store');
    });
});

Route::group(['middleware' => 'can:staf'], function() {
    Route::prefix('pengajuan')->group(function(){
        Route::prefix('surat-keterangan')->group(function(){
            Route::get('',[\App\Http\Controllers\PengajuanController::class, 'index'])->name('index.pengajuan');
            Route::get('dt/{idsurat}',[\App\Http\Controllers\PengajuanController::class, 'dt'])->name('pengajuan.dt');
            Route::get('get/{id}',[\App\Http\Controllers\PengajuanController::class, 'get'])->name('pengajuan.get');
            Route::post('validasi',[\App\Http\Controllers\PengajuanController::class, 'validasi'])->name('pengajuan.validasi');
            Route::get('pernyataan/{id}',[\App\Http\Controllers\PengajuanController::class, 'pernyataan'])->name('pengajuan.pernyataan');
            Route::get('pengantar/{id}',[\App\Http\Controllers\PengajuanController::class, 'pengantar'])->name('pengajuan.pengantar');
            Route::get('detil/{id}',[\App\Http\Controllers\PengajuanController::class, 'detil'])->name('pengajuan.detil');
            Route::post('update',[\App\Http\Controllers\PengajuanController::class, 'update'])->name('pengajuan.update');
        });
    });
});

Route::get('surat-keterangan/{id}',[\App\Http\Controllers\PengajuanController::class, 'keterangan'])->name('pengajuan.keterangan');

Route::prefix('informasi')->group(function(){
    Route::get('',[\App\Http\Controllers\InformasiController::class, 'indexberita'])->name('berita');
    Route::get('{slug}',[\App\Http\Controllers\InformasiController::class, 'detilberita'])->name('detil.berita');
});

Route::prefix('kontak-kami')->group(function(){
    Route::get('', [\App\Http\Controllers\WelcomeController::class, 'indexkontak'])->name('kontak');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('kependudukan')->group(function(){
    Route::prefix('kartu-keluarga')->group(function(){
        Route::get('',[App\Http\Controllers\KartukeluargaController::class, 'indexkk'])->name('kk');
        Route::get('dt',[App\Http\Controllers\KartukeluargaController::class, 'dt'])->name('kk.dt');
        Route::get('detil/{id}',[App\Http\Controllers\KartukeluargaController::class, 'detil'])->name('kk.detil');
        Route::get('get/{id}',[App\Http\Controllers\KartukeluargaController::class, 'get'])->name('kk.get');
        Route::post('store',[App\Http\Controllers\KartukeluargaController::class, 'store'])->name('kk.store');
        Route::post('update',[App\Http\Controllers\KartukeluargaController::class, 'update'])->name('kk.update');
    });
    Route::prefix('penduduk')->group(function(){
        Route::get('', [App\Http\Controllers\PendudukController::class, 'index'])->name('penduduk');
        Route::get('dt', [App\Http\Controllers\PendudukController::class, 'dt'])->name('penduduk.dt');
        Route::get('create', [App\Http\Controllers\PendudukController::class, 'create'])->name('penduduk.create');
        Route::get('detil/{id}', [App\Http\Controllers\PendudukController::class, 'detil'])->name('penduduk.detil');
        Route::post('store', [App\Http\Controllers\PendudukController::class, 'store'])->name('penduduk.store');
        Route::post('update', [App\Http\Controllers\PendudukController::class, 'update'])->name('penduduk.update');
    });
});

Route::group(['middleware' => 'can:admin'], function() {
    Route::prefix('post')->group(function(){
        Route::prefix('informasi')->group(function(){
            Route::get('', [App\Http\Controllers\PostController::class, 'indexinformasi'])->name('informasi');
            route::get('dt',[App\Http\Controllers\PostController::class, 'dtinformasi'])->name('informasi.dt');
            Route::get('create', [App\Http\Controllers\PostController::class, 'createinformasi'])->name('informasi.create');
            Route::get('detil/{id}', [App\Http\Controllers\PostController::class, 'detilinformasi'])->name('informasi.detil');
            Route::post('update', [App\Http\Controllers\PostController::class, 'updateinformasi'])->name('informasi.update');
            Route::post('delete', [App\Http\Controllers\PostController::class, 'deleteinformasi'])->name('informasi.delete');
            Route::post('store', [App\Http\Controllers\PostController::class, 'storeinformasi'])->name('informasi.store');
        });
        Route::prefix('galeri')->group(function(){
            Route::get('', [App\Http\Controllers\PostController::class, 'indexgaleri'])->name('galeri');
            route::get('dt',[App\Http\Controllers\PostController::class, 'dtgaleri'])->name('galeri.dt');
            Route::get('create', [App\Http\Controllers\PostController::class, 'creategaleri'])->name('galeri.create');
            Route::get('detil/{id}', [App\Http\Controllers\PostController::class, 'detilgaleri'])->name('galeri.detil');
            Route::post('update', [App\Http\Controllers\PostController::class, 'updategaleri'])->name('galeri.update');
            Route::post('delete', [App\Http\Controllers\PostController::class, 'deletegaleri'])->name('galeri.delete');
            Route::post('store', [App\Http\Controllers\PostController::class, 'storegaleri'])->name('galeri.store');
        });
    });
});


Route::prefix('staf')->group(function () {
    Route::get('', [App\Http\Controllers\StafController::class,'indexstaf'])->name('staf');
    Route::get('dt', [App\Http\Controllers\StafController::class,'dt'])->name('staf.dt');
    Route::get('create', [App\Http\Controllers\StafController::class,'createstaf'])->name('staf.create');
    Route::get('detil/{id}', [App\Http\Controllers\StafController::class,'detil'])->name('staf.detil');
    Route::get('get/{id}', [App\Http\Controllers\StafController::class,'get'])->name('staf.get');
    Route::post('store', [App\Http\Controllers\StafController::class,'store'])->name('staf.store');
    Route::post('update', [App\Http\Controllers\StafController::class,'update'])->name('staf.update');
    Route::post('user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::post('user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/biodata/{id}', [App\Http\Controllers\StafController::class,'detil'])->name('biodata');
Route::post('/ubahpassword', [App\Http\Controllers\UserController::class, 'ubahpassword'])->name('user.ubahpassword');
