<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/* para que tome las rutas se ejecuta el comando php artisan optimize */
/* para que agarre cambios de taildwin se ejecuta npm run build  */
Route::get('/inicio', [PostController::class, 'index'])->name('posts.index');
/* Route::get('/public', [PostController::class, 'index2'])->name('posts.index2'); */

Route::get('storage-link', function(){
    Artisan::call('storage:link');

    return 'Se creo el Storage LINK';
});
Route::get('hola', function(){
    return 'estoy en hola';
});
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');
Route::get('refrescar', [PostController::class, 'refrescar'])->name('posts.refrescar');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');


/* rutas para la parte ADMIN */






/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
