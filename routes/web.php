<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::prefix('/filepond')->controller(Controllers\FilepondController::class)->group(function () {
    Route::post('upload', 'upload')->name('filepond.upload');
    Route::post('multiple', 'multiple')->name('filepond.multiple');
});
Route::prefix('/article')->controller(Controllers\ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('article.index');
    Route::get('/create', 'create')->name('article.create');
    Route::post('/store', 'store')->name('article.store');
    Route::get('/{id}/show', 'show')->name('article.show');
    Route::get('/{id}/edit', 'edit')->name('article.edit');
    Route::put('/{id}/update', 'update')->name('article.update');
    Route::delete('/{id}/delete', 'destroy')->name('article.delete');
});
