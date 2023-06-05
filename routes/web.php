<?php

use App\Http\Controllers\GitarController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\JenisGitarController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TrukController;
use App\Http\Controllers\UsersController;
use App\Models\Gitar;
use App\Models\Truk;
use App\Models\User;
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

Route::get('/', function () {
    return view('index');
})->name('login');

Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('Dashboard');

//crud user print
Route::get('/Users', [UsersController::class, 'index'])->name('Users');
Route::post('/Users', [UsersController::class, 'store'])->name('StoreUsers');
Route::put('/Users/{id}', [UsersController::class, 'update'])->name('UpdateUsers');
Route::get('/Users/delete/{id}', [UsersController::class, 'delete'])->name('DelUsers');
Route::get('/Users/print/', [UsersController::class, 'print'])->name('PrintUsers');


//crud Role
Route::get('/Role', [RoleController::class, 'index'])->name('Role');
Route::post('/Role', [RoleController::class, 'store'])->name('StoreRole');
Route::put('/Role/{id}', [RoleController::class, 'update'])->name('UpdateRole');
Route::get('/Role/{id}', [RoleController::class, 'delete'])->name('DelRole');

//crud gitar print
Route::get('/datagitar', [GitarController::class, 'index'])->name('DataGitar');
Route::post('/datagitar', [GitarController::class, 'store'])->name('StoreDataGitar');
Route::put('/datagitar/{id}', [GitarController::class, 'update'])->name('UpdateDataGitar');
Route::get('/datagitar/delete/{id}', [GitarController::class, 'delete'])->name('DelDataGitar');
Route::get('/datagitar/print/', [GitarController::class, 'print'])->name('PrintDataGitar');

//crud jenis gitar
Route::get('/jenisgitar', [JenisGitarController::class, 'index'])->name('JenisGitar');
Route::post('/jenisgitar', [JenisGitarController::class, 'store'])->name('StoreJenisGitar');
Route::put('/jenisgitar/{id}', [JenisGitarController::class, 'update'])->name('UpdateJenisGitar');
Route::get('/jenisgitar/{id}', [JenisGitarController::class, 'delete'])->name('DelJenisGitar');

//crud gudang print
Route::get('/gudang', [GudangController::class, 'index'])->name('Gudang');
Route::post('/gudang', [GudangController::class, 'store'])->name('StoreGudang');
Route::put('/gudang/{id}', [GudangController::class, 'update'])->name('UpdateGudang');
Route::get('/gudang/delete/{id}', [GudangController::class, 'delete'])->name('DelGudang');
Route::get('/gudang/print/', [GudangController::class, 'print'])->name('PrintGudang');

//crud pengiriman print
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('Pengiriman');
Route::post('/pengiriman', [PengirimanController::class, 'store'])->name('StorePengiriman');
Route::put('/pengiriman/{id}', [PengirimanController::class, 'update'])->name('UpdatePengiriman');
Route::get('/pengiriman/delete/{id}', [PengirimanController::class, 'delete'])->name('DelPengiriman');
Route::get('/pengiriman/print/', [PengirimanController::class, 'print'])->name('PrintPengiriman');

//crud outlet print
Route::get('/outlet', [OutletController::class, 'index'])->name('Outlet');
Route::post('/outlet', [OutletController::class, 'store'])->name('StoreOutlet');
Route::put('/outlet/{id}', [OutletController::class, 'update'])->name('UpdateOutlet');
Route::get('/outlet/{id}', [OutletController::class, 'delete'])->name('DelOutlet');

//crud supir print
Route::get('/supir', [SupirController::class, 'index'])->name('Supir');
Route::post('/supir', [SupirController::class, 'store'])->name('StoreSupir');
Route::put('/supir/{id}', [SupirController::class, 'update'])->name('UpdateSupir');
Route::get('/supir/delete/{id}', [SupirController::class, 'delete'])->name('DelSupir');
Route::get('/supir/print/', [SupirController::class, 'print'])->name('PrintSupir');


//crud truk
Route::get('/truk', [TrukController::class, 'index'])->name('Truk');
Route::post('/truk', [TrukController::class, 'store'])->name('StoreTruk');
Route::put('/truk/{id}', [TrukController::class, 'update'])->name('UpdateTruk');
Route::get('/truk/{id}', [TrukController::class, 'delete'])->name('DelTruk');

//crud rute
Route::get('/rute', [RuteController::class, 'index'])->name('Rute');
Route::post('/rute', [RuteController::class, 'store'])->name('StoreRute');
Route::put('/rute/{id}', [RuteController::class, 'update'])->name('UpdateRute');
Route::get('/rute/{id}', [RuteController::class, 'delete'])->name('DelRute');
