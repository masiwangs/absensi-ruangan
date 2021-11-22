<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\RuanganController;
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

Route::get('/login', [AuthController::class, 'loginView'])->name('login');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [LogController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/log', [LogController::class, 'index'])->name('admin.log.index');
Route::get('/admin/log/export', [LogController::class, 'exportPreview'])->name('admin.log.export');
Route::post('/admin/log/export', [LogController::class, 'export'])->name('admin.log.export');
Route::get('/admin/log/{id}/edit', [LogController::class, 'edit'])->name('admin.log.edit');
Route::post('/admin/log/{id}/edit', [LogController::class, 'update']);
Route::get('/admin/log/{id}/keluar', [LogController::class, 'keluar'])->name('admin.log.keluar');

Route::get('/admin/pic', [PicController::class, 'index'])->name('admin.pic.index');
Route::get('/admin/pic/baru', [PicController::class, 'create'])->name('admin.pic.baru');
Route::post('/admin/pic/baru', [PicController::class, 'store']);

Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan.index');
Route::get('/admin/ruangan/baru', [RuanganController::class, 'create'])->name('admin.ruangan.baru');
Route::post('/admin/ruangan/baru', [RuanganController::class, 'store']);
Route::get('/admin/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('admin.ruangan.edit');
Route::post('/admin/ruangan/{id}/edit', [RuanganController::class, 'update']);