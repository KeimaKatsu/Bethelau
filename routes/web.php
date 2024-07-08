<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');

Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
    Route::get('/user/pemesanan', [UserController::class, 'Pemesanan'])->name('user.pemesanan');
    Route::get('/user/riwayat', [UserController::class, 'Priwayat'])->name('user.riwayat');
    Route::post('/postTambahPemesanan', [UserController::class, 'postTambahPemesanan'])->name('postTambahPemesanan');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
});
Route::post('/postTambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');



Route::group(['middleware' => ['auth', 'checklevel:cabang']], function () {
    Route::get('/cabang/home', [LoginRegisterController::class, 'cabangHome'])->name('cabang.home');
    Route::get('/cabang/laundry', [CabangController::class, 'cabangLaundry'])->name('cabang.laundry');
    Route::get('/cabang/tambahLaundry', [CabangController::class, 'tambahLaundry'])->name('cabang.tambahLaundry');
    Route::get('/cabang/editLaundry/{id}', [CabangController::class, 'editLaundry'])->name('cabang.editLaundry');
    Route::get('/cabang/deleteLaundry/{id}', [CabangController::class, 'deleteLaundry'])->name('cabang.deleteLaundry');

    Route::get('/cabang/layanan', [CabangController::class, 'layananLaundry'])->name('cabang.layanan');
    Route::get('/cabang/tambahLayanan', [CabangController::class, 'tambahLayanan'])->name('cabang.tambahLayanan');
    Route::get('/cabang/editLayanan/{id}', [CabangController::class, 'editLayanan'])->name('cabang.editLayanan');
    Route::get('/cabang/pemesanan', [CabangController::class, 'CabangPemesanan'])->name('cabang.pemesanan');
    Route::get('/cabang/editPemesanan/{id}', [CabangController::class, 'EditPemesanan'])->name('cabang.editPemesanan');
    Route::get('/cabang/deletePemesanan/{id}', [CabangController::class, 'deletePemesanan'])->name('cabang.deletePemesanan');



    Route::delete('/layanan/{id}', [CabangController::class, 'destroy']);
});
Route::post('/postTambahLaundry', [CabangController::class, 'postTambahLaundry'])->name('postTambahLaundry');
Route::post('/postEditLaundry/{id}', [CabangController::class, 'postEditLaundry'])->name('postEditLaundry');

Route::post('/postTambahLayanan', [CabangController::class, 'postTambahLayanan'])->name('postTambahLayanan');
Route::post('/cabang/layanan/edit/{id}', [CabangController::class, 'postEditLayanan'])->name('postEditLayanan');

Route::post('/postEditPemesanan/{id}', [CabangController::class, 'postEditPemesanan'])->name('cabang.postEditPemesanan');

Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
