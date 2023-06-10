<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\BrowseByLanguages;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TvController;

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

Route::view('/', 'home');
Route::post('newsletter', [NewsletterController::class, 'newsletter']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
    Route::get('/movie/{id}', [MoviesController::class, 'show'])->name('movies.show');

    Route::get('/actor/{id}', [ActorsController::class, 'show'])->name('actors.show');

    Route::get('/tvshows', [TvController::class, 'index'])->name('tv.index');
    Route::get('/tv/{id}', [TvController::class, 'show'])->name('tv.show');

    Route::get('/browse', [BrowseByLanguages::class, 'index'])->name('browse.index');
    Route::get('/browse/lang/{lang}', [BrowseByLanguages::class, 'selectByLang'])->name('browse.selectByLang');
    Route::get('/browse/sort/{sort}/{lang}', [BrowseByLanguages::class, 'sortBy'])->name('browse.sortBy');
});

require __DIR__.'/auth.php';
