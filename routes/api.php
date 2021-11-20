<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RestoranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register',[AuthController::class, 'registrasi']);
Route::post('/login',[AuthController::class, 'login']);
Route::put('/edit/{user_id}',[AuthController::class, 'editProfile']);
Route::put('/changepw/{user_id}',[AuthController::class, 'changePassword']);

//CRUD Resto beserta menunya
Route::post('/add/resto-dan-menu',[RestoranController::class, 'createRestoMenu']); 
Route::put('/update/resto-dan-menu/{resto_id}',[RestoranController::class, 'updateRestoandMenu']);
Route::post('/add/menu/{resto_id}',[RestoranController::class, 'createMenu']);
Route::put('/update/menu/{resto_id}/{menu_id}',[RestoranController::class, 'updateMenu']);
Route::get('/resto/{id}',[RestoranController::class, 'getRestoMenu']);
Route::put('/edit/resto/{id}',[RestoranController::class, 'editResto']);

// Get semua menu
Route::get('/menu',[RestoranController::class, 'getAllMenu']); 
// Get semua resto
Route::get('/resto',[RestoranController::class, 'getAllResto']); 
// Cari menu 
Route::get('/searchmenu',[RestoranController::class, 'searchMenu']);
// hapus menu
Route::delete('/deletemenu/{resto_id}/{menu_id}',[RestoranController::class, 'deleteMenu']);