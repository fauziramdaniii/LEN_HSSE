<?php

use App\Http\Controllers\DataAparController;
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
// Route Data Apar
Route::resource('/dataapar', DataAparController::class);
// Route Login
Route::get('/login', function () {
    return view('login');
});
// Route Dashboard
Route::get('/', function () {
    return view('dashboard');
});
// Route Inspeksi Apar
Route::get('/apar', function () {
    return view('apar.index');
});
Route::get('/aparcreate', function () {
    return view('apar.create');
});
