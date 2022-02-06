<?php

use App\Models\AparInspeksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AparController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataP3KController;
use App\Http\Controllers\DataAparController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\InspeksiP3KController;
use App\Http\Controllers\AparInspeksiController;
use App\Http\Controllers\MasterInspeksiController;
use App\Http\Controllers\MasterInspeksiP3KController;

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
// Route Data Apar



// Route::post('/login', [LoginController::class, 'authenticate']);
// // Route Dashboard
Route::get('/', function () {
    return view('layouts.login');
});

// Route::get('/dashboardapar', [AparInspeksiController::class, 'index']);
// Route::get('/aparcreate', function () {
//     return view('apar.create');
// });
Route::get('/pilih', function () {
    return view('layouts.pilih');
});
// Route::group([
//     'prefix' => config('admin.prefix'),
//     'namespace' => 'App\\Http\\Controllers',
// ], function () {

Route::get('/login', [LoginAdminController::class, 'formLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginAdminController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginAdminController::class, 'logout'])->middleware('auth');

//dashboard petugas
Route::get('/dashboard', [DashboardController::class, 'index']);

// Route Apar
Route::group(['prefix' => 'apar'], function () {
    Route::get('/dashboard', [DashboardController::class, 'apar']);
    Route::resource('/dataapar', DataAparController::class);
    Route::resource('/masterinspeksi', MasterInspeksiController::class);
    Route::get('/statusapar', [AparInspeksiController::class, 'status']);
    Route::get('/aparinspeksi', [AparInspeksiController::class, 'create']);
    Route::post('/inputInpeksiApar', [AparInspeksiController::class, 'store']);
});

Route::group(['prefix' => 'p3k'], function () {
    Route::get('/dashboard', [DashboardController::class, 'p3k']);
    Route::resource('/datap3k', DataP3KController::class);
    Route::resource('/masterinspeksi', MasterInspeksiP3KController::class);
    Route::get('/inspeksi', [InspeksiP3KController::class, 'index']);
    Route::get('/inputInpeksi/{id}', [InspeksiP3KController::class, 'inputInspeksi']);
    Route::put('/inputInpeksi/{id}', [InspeksiP3KController::class, 'storeInpeksi']);
    Route::get('/hasilInpeksi/{id}', [InspeksiP3KController::class, 'hasilInpeksi']);
    Route::get('/inspeksi/{periode}', [InspeksiP3KController::class, 'detailInspeksi']);

    Route::get('/statusp3k', [InspeksiP3KController::class, 'status']);
    Route::get('/p3kinpeksi', [InspeksiP3KController::class, 'create']);
    Route::post('/inputInpeksiApar', [InspeksiP3KController::class, 'store']);
});

//     Route::middleware(['auth:admin'])->group(function () {
//         Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
//         Route::view('/', 'dashboard')->name('dashboard');
//         Route::view('/post', 'data-post')->name('post')->middleware('can:role,"admin","editor"');
//         Route::view('/admin', 'data-admin')->name('admin')->middleware('can:role,"admin"');
//     });
// });
