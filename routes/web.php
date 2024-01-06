<?php

use App\Http\Controllers\AccueillController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [AccueillController::class,'index'])->name('index');
Route::get('/param', [AccueillController::class,'param'])->name('param');
Route::put('/param', [AccueillController::class,'update'])->name('param.update');

Route::resource('/projets', ProjetsController::class);
Route::resource('/reseaux', ReseauController::class);
Route::resource('/competences', CompetenceController::class);


Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
Route::post('/contact',[ContactController::class, 'sendMail'])->name('contact.sendMail');

Route::get('/home', function () {
    return redirect()->route('competences.index');
})->middleware(['auth'])->name('home');