<?php

use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\ReseauController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/projets', ProjetsController::class);
Route::resource('/reseaux', ReseauController::class);
Route::resource('/competences', CompetenceController::class);

Route::get('/home', function () {
    return view('competences.index');
})->middleware(['auth'])->name('home');