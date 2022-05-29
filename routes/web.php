<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/**
 * Route::get       | Consultar
 * Route::post      | Guardar
 * Route::delete    | Eliminar
 * Route::put       | Actualizar
 */
/**
 * Route::get('/', [PageController::class, 'home'])->name('home');
 * Route::get('blog', [PageController::class, 'blog'])->name('blog');
 * Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
 */

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('blog/{post:slug}', 'post')->name('post');
});

Route::redirect('dashboard', 'posts')->name('dashboard');

/** 
Route::middleware('auth')->group(function() {
    Route::resource('posts', PostController::class)->except('show');
});
*/

Route::resource('posts', PostController::class)->middleware(['auth'])->except('show');

require __DIR__.'/auth.php';
