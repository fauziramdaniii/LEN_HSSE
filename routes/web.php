<?php

use GuzzleHttp\Middleware;
use App\Models\AparInspeksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AparController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataP3KController;
use App\Http\Controllers\DataAparController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ReportAparController;
use App\Http\Controllers\InspeksiP3KController;
use App\Http\Controllers\AparInspeksiController;
use App\Http\Controllers\MasterInspeksiController;
use App\Http\Controllers\KelolaParameterController;
use App\Http\Controllers\MasterInspeksiP3KController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});

// Route::get('/dashboardapar', [AparInspeksiController::class, 'index']);
// Route::get('/aparcreate', function () {
//     return view('apar.create');
// });
Route::get('/pilih', [DashboardController::class, 'pilih']);
// Route::group([
//     'prefix' => config('admin.prefix'),
//     'namespace' => 'App\\Http\\Controllers',
// ], function () {

Route::get('/login', [LoginAdminController::class, 'formLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginAdminController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginAdminController::class, 'logout'])->middleware('auth');

//dashboard petugas
Route::get('/dashboard', [DashboardController::class, 'index']);

//tambah Supervisior    
Route::post('/user', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::put('/user/resetPassword/{id}', [UserController::class, 'resetPassword']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
// Route Apar
Route::group(['prefix' => 'apar', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'apar']);
    Route::get('/dataapar/export', [DataAparController::class, 'export_pdf']);
    Route::get('/inspeksiTahunan/{id}/export', [AparInspeksiController::class, 'exportTahunan_pdf']);
    Route::resource('/dataapar', DataAparController::class);
    Route::get('/masterinspeksi/{id}/export', [MasterInspeksiController::class, 'export_pdf']);
    Route::resource('/masterinspeksi', MasterInspeksiController::class);
    Route::get('/inspeksi', [AparInspeksiController::class, 'index']);
    Route::get('/inspeksi/{periode}', [AparInspeksiController::class, 'detailInspeksi']);
    Route::get('/inspeksi/{periode}/inputInpeksiApar', [AparInspeksiController::class, 'create']);
    // Route::get('/statusapar', [AparInspeksiController::class, 'status']);
    Route::get('/inputInpeksiApar', [AparInspeksiController::class, 'create']);
    Route::post('/inputInpeksiApar', [AparInspeksiController::class, 'store']);
    Route::get('/kelolaParameter', [KelolaParameterController::class, 'index']);
    Route::post('/tambahTipe', [KelolaParameterController::class, 'tambahTipe']);
    Route::post('/tambahJenis', [KelolaParameterController::class, 'tambahJenis']);
    Route::delete('/deleteTipe/{id}', [KelolaParameterController::class, 'deleteTipe']);
    Route::delete('/deleteJenis/{id}', [KelolaParameterController::class, 'deleteJenis']);
    Route::put('/editTipe/{id}', [KelolaParameterController::class, 'editTipe']);
    Route::put('/editJenis/{id}', [KelolaParameterController::class, 'editJenis']);
    Route::get('/hasilInspeksi/{id}', [AparInspeksiController::class, 'hasil']);

    // Route::get('/report', [ReportAparController::class, 'index']);
});

Route::group(['prefix' => 'p3k', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'p3k']);
    Route::get('/datap3k/export', [DataP3KController::class, 'export_pdf']);
    Route::get('/inspeksiTahunan/{id}/export', [InspeksiP3KController::class, 'exportTahunan_pdf']);
    Route::resource('/datap3k', DataP3KController::class);
    Route::get('/masterinspeksi/{id}/export', [MasterInspeksiP3KController::class, 'export_pdf']);
    Route::resource('/masterinspeksi', MasterInspeksiP3KController::class);
    Route::get('/inspeksi', [InspeksiP3KController::class, 'index']);
    Route::get('/inspeksi/{id}/inputInpeksi', [InspeksiP3KController::class, 'inputInspeksi']);
    Route::put('/inputInpeksi/{id}', [InspeksiP3KController::class, 'storeInpeksi']);
    Route::get('/inspeksi/{id}/hasilInpeksi', [InspeksiP3KController::class, 'hasilInpeksi']);
    Route::get('/inspeksi/{periode}', [InspeksiP3KController::class, 'detailInspeksi']);


    // Route::get('/statusp3k', [InspeksiP3KController::class, 'status']);
    // Route::get('/p3kinpeksi', [InspeksiP3KController::class, 'create']);
    // Route::post('/inputInpeksiApar', [InspeksiP3KController::class, 'store']);
});

//     Route::middleware(['auth:admin'])->group(function () {
//         Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
//         Route::view('/', 'dashboard')->name('dashboard');
//         Route::view('/post', 'data-post')->name('post')->middleware('can:role,"admin","editor"');
//         Route::view('/admin', 'data-admin')->name('admin')->middleware('can:role,"admin"');
//     });
// });
