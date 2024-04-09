<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;



Route::get('/', [FileController::class, 'home'])->name('home');
Route::post('/upload', [FileController::class, 'upload'])->name('upload');
Route::get('/preview/{unid}', [FileController::class, 'preview'])->name('preview');
Route::get('/download/{unid}', [FileController::class, 'download'])->name('download');
