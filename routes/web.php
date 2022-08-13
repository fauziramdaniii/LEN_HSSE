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
Route::get('/getKota/{provinsi}', [KelolaParameterController::class, 'getKota']);
Route::get('/pilih', [DashboardController::class, 'pilih']);


Route::get('/login', [LoginAdminController::class, 'formLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginAdminController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginAdminController::class, 'logout'])->middleware('auth');
Route::get('/editAkun', [UserController::class, 'editAkun'])->middleware('auth');
Route::post('/editAkun/{id}', [UserController::class, 'updateAkun']);
//dashboard petugas
Route::get('/dashboard', [DashboardController::class, 'index']);

//tambah Supervisior
Route::post('/user', [UserController::class, 'store'])->middleware('auth');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::put('/user/resetPassword/{id}', [UserController::class, 'resetPassword'])->middleware('auth');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('auth');

// Route Apar
Route::group(['prefix' => 'apar'], function () {
    Route::get('/dashboard', [DashboardController::class, 'apar'])->middleware('supervisior');
    Route::get('/dataapar/{id}/detail', [DataAparController::class, 'detailApar'])->middleware('supervisior');
    Route::get('/dataapar/export', [DataAparController::class, 'export_pdf'])->middleware('supervisior');
    Route::get('/inspeksiTahunan/{id}/export', [AparInspeksiController::class, 'exportTahunan_pdf'])->middleware('supervisior');
    Route::resource('/dataapar', DataAparController::class)->middleware('supervisior');
    Route::get('/masterinspeksi/{id}/export', [MasterInspeksiController::class, 'export_pdf'])->middleware('supervisior');
    Route::resource('/masterinspeksi', MasterInspeksiController::class)->middleware('supervisior');
    Route::get('/inspeksi', [AparInspeksiController::class, 'index']);
    Route::get('/inspeksi/{periode}', [AparInspeksiController::class, 'detailInspeksi']);
    Route::get('/inspeksi/{periode}/inputInpeksiApar', [AparInspeksiController::class, 'create']);
    Route::get('/inspeksi/{id}/editInspeksi', [AparInspeksiController::class, 'editInspeksi']);
    Route::post('/inspeksi/verifikasi', [AparInspeksiController::class, 'verifikasi']);
    Route::get('/inputInpeksiApar', [AparInspeksiController::class, 'create']);
    Route::post('/inputInpeksiApar', [AparInspeksiController::class, 'store']);
    Route::get('/kelolaParameter', [KelolaParameterController::class, 'index'])->middleware('supervisior');
    Route::post('/tambahTipe', [KelolaParameterController::class, 'tambahTipe'])->middleware('supervisior');
    Route::post('/tambahJenis', [KelolaParameterController::class, 'tambahJenis'])->middleware('supervisior');
    Route::post('/tambahZona', [KelolaParameterController::class, 'tambahZona'])->middleware('supervisior');
    Route::delete('/deleteTipe/{id}', [KelolaParameterController::class, 'deleteTipe'])->middleware('supervisior');
    Route::delete('/deleteZona/{id}', [KelolaParameterController::class, 'deleteZona'])->middleware('supervisior');
    Route::delete('/deleteJenis/{id}', [KelolaParameterController::class, 'deleteJenis'])->middleware('supervisior');
    Route::put('/editTipe/{id}', [KelolaParameterController::class, 'editTipe'])->middleware('supervisior');
    Route::put('/editJenis/{id}', [KelolaParameterController::class, 'editJenis'])->middleware('supervisior');
    Route::put('/editZona/{id}', [KelolaParameterController::class, 'editZona'])->middleware('supervisior');
    Route::get('/hasilInspeksi/{id}', [AparInspeksiController::class, 'hasil']);

    // Route::get('/report', [ReportAparController::class, 'index']);
});

Route::group(['prefix' => 'p3k', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'p3k'])->middleware('supervisior');
    Route::get('/datap3k/export', [DataP3KController::class, 'export_pdf'])->middleware('supervisior');
    Route::get('/inspeksiTahunan/{id}/export', [InspeksiP3KController::class, 'exportTahunan_pdf'])->middleware('supervisior');
    Route::resource('/datap3k', DataP3KController::class)->middleware('supervisior');
    Route::get('/masterinspeksi/{id}/export', [MasterInspeksiP3KController::class, 'export_pdf'])->middleware('supervisior');
    Route::resource('/masterinspeksi', MasterInspeksiP3KController::class)->middleware('supervisior');
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
