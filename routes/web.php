<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::prefix('/filepond')->controller(Controllers\FilepondController::class)->group(function () {
    Route::get('/', 'index')->name('filepond.index');
    Route::get('create', 'create')->name('filepond.create');
    Route::get('show/{id}', 'show')->name('filepond.show');
    Route::post('store', 'store')->name('filepond.store');
    Route::post('upload', 'upload')->name('filepond.upload');
    Route::post('multiple', 'multiple')->name('filepond.multiple');
});
