<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
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

<<<<<<< Updated upstream
Route::get('/profile', function () {
    return view('profile');
=======
Route::get('/tes', function () {
    return view('report');
>>>>>>> Stashed changes
});
Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/detail-laporan', function () {
    return view('detail-laporan');
});



Route::get('/login', [AuthenticateController::class, 'login_index'])->name('signin.index');
Route::post('/login', [AuthenticateController::class, 'authenticate'])->name('signin.auth');
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::get('/register', [AuthenticateController::class, 'register_index'])->name('signup.index');
Route::post('/register', [AuthenticateController::class, 'register'])->name('signup.auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [Controller::class, 'index'])->name('index');

    Route::group(['prefix' => 'jurusan'], function () {
        Route::post('/', [KelasController::class, 'jurusan_store']);
        Route::get('delete/{id}', [KelasController::class, 'jurusan_delete'])->name('jurusan.delete');
    });

    Route::group(['prefix' => 'kelas'], function () {
        Route::get('/', [KelasController::class, 'index'])->name('kelas');
        Route::delete('/delete/{jurusan:id}', [KelasController::class, 'jurusan_delete'])->name('jurusan.delete');



        Route::get('detail/{id}', [KelasController::class, 'kelas_detail'])->name('kelas.detail');
        Route::get('edit/{id}/{nama_kelas}', [KelasController::class, 'kelas_edit'])->name('kelas.edit');
        Route::put('update/{id}', [KelasController::class, 'kelas_update'])->name('kelas.update');
        Route::get('delete/{id}', [KelasController::class, 'kelas_delete'])->name('kelas.delete');
        Route::post('/', [KelasController::class, 'kelas_store']);
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
        Route::delete('/delete/{guru:id}', [GuruController::class, 'destroy'])->name('guru.delete');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [AuthenticateController::class, 'show'])->name('user');
        Route::PUT('/update/{user:id}', [AuthenticateController::class, 'update'])->name('user.update');
        Route::delete('/delete/{user:id}', [AuthenticateController::class, 'delete'])->name('user.delete');
    });

    Route::group(['prefix' => 'form'], function () {
        Route::get('/create-new/guru', [GuruController::class, 'create'])->name('guru.create');
        Route::get('/edit/guru/{guru:id}', [GuruController::class, 'edit'])->name('guru.edit');

        Route::get('/create-new/siswa', [SiswaController::class, 'create'])->name('siswa.create');
        Route::get('/edit/siswa/{siswa:id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::get('/create-new/siswa-import', [SiswaController::class, 'importView'])->name('siswa.import');
    });
    Route::post('/getjurusanid', [Controller::class, 'get_jurusan'])->name('ajax.getJurusanID');
});

