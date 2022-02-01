<?php

use App\Models\AparInspeksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AparController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataAparController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AparInspeksiController;
use App\Http\Controllers\MasterInspeksiController;

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
    Route::get('/dashboard', [AparInspeksiController::class, 'index']);
    Route::resource('/dataapar', DataAparController::class);
    Route::resource('/masterinspeksi', MasterInspeksiController::class);
    Route::get('/statusapar', [AparInspeksiController::class, 'status']);
    Route::get('/aparinspeksi', [AparInspeksiController::class, 'create']);
    Route::post('/inputInpeksiApar', [AparInspeksiController::class, 'store']);
});

//     Route::middleware(['auth:admin'])->group(function () {
//         Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
//         Route::view('/', 'dashboard')->name('dashboard');
//         Route::view('/post', 'data-post')->name('post')->middleware('can:role,"admin","editor"');
//         Route::view('/admin', 'data-admin')->name('admin')->middleware('can:role,"admin"');
//     });
// });
