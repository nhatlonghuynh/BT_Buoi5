<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
// Công khai
Route::resource('articles', ArticleController::class)->only(['index', 'show']);
// Cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])
        ->name('articles.create')
        ->middleware('can:create,App\Models\Article');
    Route::post('/articles', [ArticleController::class, 'store'])
        ->name('articles.store')
        ->middleware('can:create,App\Models\Article');
    Route::get('/articles/{article}/edit', [
        ArticleController::class,
        'edit'
    ])
        ->name('articles.edit')
        ->middleware('can:update,article');

    Route::put('/articles/{article}', [ArticleController::class, 'update'])
        ->name('articles.update')
        ->middleware('can:update,article');
    Route::delete('/articles/{article}', [
        ArticleController::class,
        'destroy'
    ])
        ->name('articles.destroy')
        ->middleware('can:delete,article');
});
