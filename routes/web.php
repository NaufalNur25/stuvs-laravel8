<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

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

Route::get('/tes', function () {
    return view('laporan');
});


Route::get('/detail-laporan', function () {
    return view('detail-laporan');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginSession'])->name('login.session');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'registerSession'])->name('register.session');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:Administrator'], function() {
        Route::group(['prefix' => 'jurusan'], function () {
            Route::post('/create-new/jurusan/store', [KelasController::class, 'jurusan_store'])->name('jurusan.store');
            Route::delete('delete/{jurusan:id}', [KelasController::class, 'jurusan_delete'])->name('jurusan.delete');
        });

        Route::group(['prefix' => 'kelas'], function () {
            Route::get('/', [KelasController::class, 'index'])->name('kelas');
            Route::post('/create-new/kelas/store', [KelasController::class, 'kelas_store'])->name('kelas.store');
            Route::put('update/{id}', [KelasController::class, 'kelas_update'])->name('kelas.update');
            Route::delete('delete/{kelas:id}', [KelasController::class, 'kelas_delete'])->name('kelas.delete');



            Route::get('detail/{id}', [KelasController::class, 'kelas_detail'])->name('kelas.detail');
            Route::get('edit/{id}/{nama_kelas}', [KelasController::class, 'kelas_edit'])->name('kelas.edit');
        });

        Route::group(['prefix' => 'siswa'], function () {
            Route::get('/{item?}', [SiswaController::class, 'index'])->name('siswa');
            Route::post('/create-new/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
            Route::put('/update/{siswa:id}', [SiswaController::class, 'update'])->name('siswa.update');
            Route::delete('/delete/{siswa:id}', [SiswaController::class, 'delete'])->name('siswa.delete');

            Route::post('/file-import/import', [SiswaController::class, 'import'])->name('import.siswa');
        });

        Route::group(['prefix' => 'guru'], function () {
            Route::get('/', [GuruController::class, 'index'])->name('guru');
            Route::post('/create-new/guru/store', [GuruController::class, 'store'])->name('guru.store');
            Route::PUT('/update/{guru:id}', [GuruController::class, 'update'])->name('guru.update');
            Route::delete('/delete/{guru:id}', [GuruController::class, 'delete'])->name('guru.delete');

            Route::post('/file-import/import', [GuruController::class, 'import'])->name('import.guru');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [AuthController::class, 'show'])->name('user');
            Route::PUT('/update/{user:id}', [AuthController::class, 'update'])->name('user.update');
            Route::delete('/delete/{user:id}', [AuthController::class, 'delete'])->name('user.delete');
        });

        Route::group(['prefix' => 'form'], function () {
            Route::get('/create-new/guru', [GuruController::class, 'create'])->name('guru.create');
            Route::get('/edit/guru/{guru:id}', [GuruController::class, 'edit'])->name('guru.edit');
            Route::get('/create-new/guru-import',[GuruController::class, 'importView']) ->name('guru.import');

            Route::get('/create-new/siswa', [SiswaController::class, 'create'])->name('siswa.create');
            Route::get('/edit/siswa/{siswa:id}', [SiswaController::class, 'edit'])->name('siswa.edit');
            Route::get('/create-new/siswa-import', [SiswaController::class, 'importView'])->name('siswa.import');

            Route::get('/create-new/jurusan', [KelasController::class, 'jurusan_create'])->name('jurusan.create');
            Route::get('/create-new/kelas', [KelasController::class, 'kelas_create'])->name('kelas.create');


            Route::get('/create-new/laporan', [LaporanController::class, 'laporan_create'])->name('laporan.create');
            Route::get('/create-new/kategori-laporan', [LaporanController::class, 'kategoriLaporan_create'])->name('kategoriLaporan.create');
            Route::get('/edit/kategori-laporan/{kategorilaporan:id}', [LaporanController::class, 'kategoriLaporan_edit'])->name('kategoriLaporan.edit');
        });

        Route::group(['prefix' => 'laporan'], function () {
            Route::get('/kategori', [LaporanController::class, 'kategoriLaporanIndex'])->name('kategoriLaporan.index');
            Route::post('/create-new/kategori-laporan/store', [LaporanController::class, 'kategoriLaporanStore'])->name('kategoriLaporan.store');
            Route::PUT('/update/{kategorilaporan:id}', [LaporanController::class, 'kategoriLaporanUpdate'])->name('kategoriLaporan.update');
            Route::delete('/delete/{kategorilaporan:id}', [LaporanController::class, 'kategoriLaporanDelete'])->name('kategoriLaporan.delete');

            Route::get('/laporan', [LaporanController::class, 'laporanIndex'])->name('laporan.index');
            Route::get('/laporan/{laporan:nis}/detail-laporan', [LaporanController::class, 'laporanDetail'])->name('laporan.detail');
            Route::post('/create-new/laporan/store', [LaporanController::class, 'laporanStore'])->name('laporan.store');
        });
        Route::post('/getjurusanid', [Controller::class, 'get_jurusan'])->name('ajax.getJurusanID');
        Route::post('/getnamalengkap', [Controller::class, 'get_namalengkap'])->name('ajax.getSiswa');
    });

    Route::get('/', [Controller::class, 'index'])->name('index');
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/edit/profile/{auth:id}', [AuthController::class, 'edit'])->name('profile.edit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
