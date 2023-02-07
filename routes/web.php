<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/data-siswa', [SiswaController::class, 'index']);


Route::get('/login', [AuthenticateController::class, 'login_index']);
Route::post('/login', [AuthenticateController::class, 'authenticate']);
Route::post('/logout', [AuthenticateController::class, 'logout']);

Route::get('/register', [AuthenticateController::class, 'register_index']);
Route::post('/register', [AuthenticateController::class, 'register']);


Route::get('/jurusan', [KelasController::class, 'jurusan_index']);
Route::post('/jurusan', [KelasController::class, 'jurusan_store']);
Route::get('/jurusan/delete/{id}', [KelasController::class, 'jurusan_delete'])->name('jurusan.delete');

Route::get('/kelas/detail/{id}', [KelasController::class, 'kelas_detail'])->name('kelas.detail');
Route::get('/kelas/edit/{id}', [KelasController::class, 'kelas_update'])->name('kelas.edit');
Route::post('/kelas', [KelasController::class, 'kelas_store']);
