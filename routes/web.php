<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // compte controller
    Route::get('/compte',[CompteController::class,'index'])->name('compte.index');
    Route::get('/compte/create',[CompteController::class,'create'])->name('compte.create');
    Route::post('/compte/store',[CompteController::class,'store'])->name('compte.store');
    Route::get('/compte/show/{id}',[CompteController::class,'show'])->name('compte.show');
    // Route::get('/compte/deposer-form',[CompteController::class,'create'])->name('compte.deposer_form');
    Route::get('/compte/deposer-form/{id}',[CompteController::class,'depotForm'])->name('compte.deposer_form');
    Route::post('/compte/deposer-store',[CompteController::class,'depotStore'])->name('compte.deposer_store');
    Route::get('/compte/retrait-form/{id}',[CompteController::class,'retraitForm'])->name('compte.retrait_form');
    Route::post('/compte/retrait-store',[CompteController::class,'retraitStore'])->name('compte.retrait_store');
    Route::delete('/compte/delete/{id}',[CompteController::class,'destroy'])->name("compte.delete");



});

require __DIR__.'/auth.php';
