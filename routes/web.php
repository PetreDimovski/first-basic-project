<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


/*

    GET -> Request a resource

    POST -> Create a new resource

    PUT -> Update a resource

    PATCH -> Modify / Edit a resource

    DELETE -> Delete a resource

    OPTIONS -> Ask the serves which verbs are aloowed

*/

Route::prefix('/blog')->group( function () {
    //GET
    Route::get('/', [PostsController::class,'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class,'show'])->name('blog.show');
    //POST
    Route::get('/create', [PostsController::class,'create'])->name('blog.create');
    Route::post('/', [PostsController::class,'store'])->name('blog.store');
    //PUT or PATCH
    Route::get('/edit/{id}', [PostsController::class,'edit'])->name('blog.edit');
    Route::patch('/{id}', [PostsController::class,'update'])->name('blog.update');
    //DELETE
    Route::delete('/{id}', [PostsController::class,'destroy'])->name('blog.destroy');
});

//Route::resource('blog', PostsController::class);


//Route for invoke method
Route::get('/',HomeController::class);

//Multiple HHTP verbs

//Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
//Route::any('/blog', [PostsController::class, 'index']);




