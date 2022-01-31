<?php

use App\Http\Controllers\DataAparController;
use App\Http\Controllers\AparInspeksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AparController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterInspeksiController;
use App\Models\AparInspeksi;

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
Route::resource('dataapar', DataAparController::class);
Route::resource('statusapar', AparInspeksiController::class);
Route::get('aparinspeksi', [AparInspeksiController::class, 'create']);
Route::resource('masterinspeksi', MasterInspeksiController::class);
// Route::post('/login', [LoginController::class, 'authenticate']);
// // Route Dashboard
Route::get('/', function () {
    return view('layouts.login');
});
// Route Inspeksi Apar
Route::get('/dashboardapar', function () {
    return view('petugasapar.index');
});
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

//     Route::get('login', 'LoginAdminController@formLogin')->name('login');
//     Route::post('login', 'LoginAdminController@login');

//     Route::middleware(['auth:admin'])->group(function () {
//         Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
//         Route::view('/', 'dashboard')->name('dashboard');
//         Route::view('/post', 'data-post')->name('post')->middleware('can:role,"admin","editor"');
//         Route::view('/admin', 'data-admin')->name('admin')->middleware('can:role,"admin"');
//     });
// });
