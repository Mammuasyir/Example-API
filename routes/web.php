<?php

use App\Http\Controllers\WEB\Auth2Controller;
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

//login api ICT
Route::get('/login',[Auth2Controller::class, 'login']);
Route::post('/data-login', [Auth2Controller::class, 'Datalogin']);
// Register and login api sendiri
Route::get('/my-register', [Auth2Controller::class, 'Myregister']);
Route::post('/register', [Auth2Controller::class, 'register']);
Route::get('/mylogin',[Auth2Controller::class, 'loginMyApi']);
Route::post('/mydata-login', [Auth2Controller::class, 'DataloginMyApi']);
Route::get('/editprofile/{user_id}',[Auth2Controller::class, 'editProfile']);
Route::put('/update/{user_id}',[Auth2Controller::class, 'updateProfile']);



