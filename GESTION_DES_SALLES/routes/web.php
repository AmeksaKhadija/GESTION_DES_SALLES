<?php

use App\Http\Controllers\SalleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
//     return view('home');
// });

// crud du salle 
Route::get('/dashboard', [UserController::class, 'index']);
Route::get('/salles', [SalleController::class, 'index'])->name('salles.index');
Route::post('/salles', [SalleController::class, 'store'])->name('salles.store');
Route::get('/editeSalle/{id}', [SalleController::class, 'edit'])->name('editeSalle/{id}');
Route::post('/updateSalle', [SalleController::class, 'update'])->name('updateSalle');
Route::delete('/deleteSalle/{id}', [SalleController::class, 'destroy'])->name('deleteSalle');

// activer une salle 
Route::post('/salle/{id}/desactivate', [SalleController::class, 'desactivate'])->name('desactivateSalle');

// home page
Route::get('/', [SalleController::class, 'showSalleToReserve'])->name('home.showSalleToReserve');
// Route::get('/', function () {
//     return view('home');
// });

Route::post('/reserveeSalle',[SalleController::class,'reservee'])->name('reservee');