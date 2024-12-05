<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ImportProductController;

Route::get('/', function () {
    return view('index');
});
Route::prefix('/filepond')->controller(Controllers\FilepondController::class)->group(function () {
    Route::get('/', 'index');
    // Route::post('store', 'store')->name('filepond.store');
    // Route::post('uploads/process', 'process')->name('filepond.uploads.process');
    // Route::post('/products/import', 'import')->name('filepond.import');
});


Route::post('uploads/process', [FileUploadController::class, 'process'])->name('uploads.process');
Route::post('products/import', ImportProductController::class)->name('products.import');
