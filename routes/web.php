<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BrowseByLangGenre;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddToMyListController;

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

Route::view('/', 'home-page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [MoviesController::class, 'home'])->name('home');
    Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
    Route::get('/movie/{id}', [MoviesController::class, 'show'])->name('movies.show');

    Route::get('/actor/{id}', [ActorsController::class, 'show'])->name('actors.show');

    Route::get('/tvshows', [TvController::class, 'index'])->name('tv.index');
    Route::get('/tv/{id}', [TvController::class, 'show'])->name('tv.show');

    Route::get('/browse', [BrowseByLangGenre::class, 'index'])->name('browse.index');
    Route::get('/browse/lang/{lang}', [BrowseByLangGenre::class, 'selectByLang'])->name('browse.lang');
    Route::get('/browse/sort/{sort}/{lang}/{genre?}', [BrowseByLangGenre::class, 'sortBy'])->name('browse.sortBy');
    Route::get('/browse/genre/{genre}/{lang}/{sort?}', [BrowseByLangGenre::class, 'selectByGenres'])->name('browse.genre');

    Route::get('/rating/{title}', [RatingController::class, 'rating'])->name('rating');

    Route::resource('/my-list', AddToMyListController::class)->only(['index', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
