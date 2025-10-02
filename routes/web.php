<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get(
    'hello',
    function () {
        return 'Xin chào Laravel 12!';
    }
);
Route::get('/time', function () {
    return now()->format('H:i:s d/m/Y');
});
Route::get('/sum/{a}/{b}', function ($a, $b) {
    if (!is_numeric($a) || !is_numeric($b)) {
        return response('Tham số phải là số nguyên', 400);
    }
    return (int)$a + (int)$b;
});

use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/db', [StudentController::class, 'indexDB'])->name('students.db');

Route::get('/students/combined', [StudentController::class, 'combined']);

Route::get('/pages/about', [PageController::class, 'about']);

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/articles/page/{page}', function ($page) {
    return "Trang bai viet so: " . (int)$page;
})->whereNumber('page')->name('articles.page');


Route::get('/articles/slug/{slug?}', function ($slug = 'Khong-co-slug') {
    return "Slug: " . $slug;
})->where('slug', '[a-z0-9-]+');

Route::prefix('admin')->group(function () {
    Route::get('/articles', fn() => 'Quan tri bai viet')
        ->name('admin.articles.index');
});

Route::resource('articles', ArticleController::class);
