<?php

use App\Http\Controllers\WEB\DoaController;
use App\Http\Controllers\WEB\IctController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DoaController::class, 'Doa'])->name('Doa');
Route::get('/post-data', [DoaController::class, 'Postdata']);
Route::post('/posting', [DoaController::class, 'Posting']);
Route::get('/postingkate', [DoaController::class, 'Postingkate']);
Route::post('/postingkategory', [DoaController::class, 'Postingkategory']); 
Route::get('/Ict', [IctController::class, 'Ict'])->name('Ict');

Route::get('/login',[DoaController::class, 'login']);
Route::get('/data-login', [DoaController::class, 'Datalogin']);

