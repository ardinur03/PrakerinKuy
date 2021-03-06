<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HubinController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Hubin\SiswaControllerHubin;

// livewire
use App\Http\Livewire\Hsiswa\TblSiswa;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hallo', function () {
    return view('home');
});


/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [SuperAdminController::class, 'index'])->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
});


/*
|--------------------------------------------------------------------------
| HUBIN ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/hubin/dashboard', [HubinController::class, 'index'])->name('hubin.dashboard');

    // CRUD SISWA
    Route::get('/hubin/siswa', TblSiswa::class)->name('hubin.index.siswa');

    Route::get('/template-excel-create-siswa', [HubinController::class, 'dwTemplateCreateSiswa'])->name('ex_create_siswa');
});
