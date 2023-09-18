<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

Route::get('/', [AutoController::class,'listaz'])->name('fooldal');

Route::get('/felvetel', [AutoController::class,'felvetel'])->name('felvetel');
