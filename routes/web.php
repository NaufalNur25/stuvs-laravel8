<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticateController;
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

Route::get('/tes', function () {
    return view('tes');
});
// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/login', [AuthenticateController::class, 'login_index']);
// Route::post('/login', [AuthenticateController::class, 'authenticate']);
// Route::post('/logout', [AuthenticateController::class, 'logout']);

// Route::get('/register', [AuthenticateController::class, 'register_index']);
// Route::post('/register', [AuthenticateController::class, 'register']);


// Route::get('/jurusan', [KelasController::class, 'jurusan_index'])->name('jurusan');
// Route::post('/jurusan', [KelasController::class, 'jurusan_store']);
// Route::get('/jurusan/delete/{id}', [KelasController::class, 'jurusan_delete'])->name('jurusan.delete');

// Route::get('/kelas/detail/{id}', [KelasController::class, 'kelas_detail'])->name('kelas.detail');
// Route::get('/kelas/edit/{id}/{nama_kelas}', [KelasController::class, 'kelas_edit'])->name('kelas.edit');
// Route::get('/kelas/update/{id}', [KelasController::class, 'kelas_update'])->name('kelas.update');
// Route::get('/kelas/delete/{kelas:id}', [KelasController::class, 'kelas_delete'])->name('kelas.delete');
// Route::post('/kelas', [KelasController::class, 'kelas_store']);


// Route::get('/siswa/{item?}', [SiswaController::class, 'index'])->name('siswa');
// Route::get('/create-new/siswa', [SiswaController::class, 'siswa_create'])->name('siswa.create');
// // Route::get('/create-new/siswa/store', [SiswaController::class, 'store'])->middleware(HashMiddleware::class)->name('siswa.store');
// // Route::get('/siswa/update/{id?}', [SiswaController::class, 'index'])->middleware(HashMiddleware::class)->name('siswa');
// Route::get('/create-new/siswa/store', [SiswaController::class, 'store']);
// Route::get('/siswa/update/{id?}', [SiswaController::class, 'index']);

// Route::get('/file-import', [SiswaController::class, 'importView'])->name('import-view');
// Route::post('/import',[SiswaController::class, 'import'])->name('import');


Route::get('/login', [AuthenticateController::class, 'login_index'])->name('signin.index');
Route::post('/login', [AuthenticateController::class, 'authenticate'])->name('signin.auth');
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::get('/register', [AuthenticateController::class, 'register_index'])->name('signup.index');
Route::post('/register', [AuthenticateController::class, 'register'])->name('signup.auth');

Route::group(['middleware' => ['auth', 'role']], function () {
    Route::get('/', [Controller::class, 'index'])->name('index');
    Route::group(['prefix' => 'jurusan'], function () {
        Route::get('/', [KelasController::class, 'jurusan_index'])->name('jurusan');
        Route::post('/', [KelasController::class, 'jurusan_store']);
        Route::get('delete/{id}', [KelasController::class, 'jurusan_delete'])->name('jurusan.delete');
    });

    Route::group(['prefix' => 'kelas'], function () {
        Route::get('detail/{id}', [KelasController::class, 'kelas_detail'])->name('kelas.detail');
        Route::get('edit/{id}/{nama_kelas}', [KelasController::class, 'kelas_edit'])->name('kelas.edit');
        Route::put('update/{id}', [KelasController::class, 'kelas_update'])->name('kelas.update');
        Route::get('delete/{kelas:id}', [KelasController::class, 'kelas_delete'])->name('kelas.delete');
        Route::post('/', [KelasController::class, 'kelas_store']);
    });

    Route::group(['prefix' => 'siswa'], function () {
        Route::get('/table/show/{item?}', [SiswaController::class, 'index'])->name('siswa');

        Route::get('/create-new', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/getjurusanid', [SiswaController::class, 'get_jurusan'])->name('ajax.getJurusanID');
        Route::post('/create-new/store', [SiswaController::class, 'store'])->name('siswa.store');


        Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');

        Route::get('/delete/{siswa:id}', [SiswaController::class, 'delete'])->name('siswa.delete');

        Route::get('/create-new/file-import', [SiswaController::class, 'importView'])->name('import-view');
        Route::post('/file-import/import', [SiswaController::class, 'import'])->name('import.siswa');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/create-new/role', [AuthenticateController::class, 'create_role'])->name('user.role');
        Route::post('/create-new/role', [AuthenticateController::class, 'store_role'])->name('store.role');

        Route::get('/table/show', [SiswaController::class, 'user_show'])->name('user');
        Route::PUT('/update/{user:id}', [SiswaController::class, 'user_update'])->name('user.update');
    });
});
