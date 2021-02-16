<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mongodb', function () {
    return \App\Models\Author::whereHas('posts', function ($query) {
        $query->where('title', 'like', "%He must%");
    })->with(['posts' => function ($query) {
        $query->select(['id', 'title', 'body', 'author_id']);
    }])->get();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
