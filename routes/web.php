<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;

Route::get('/', [AutoController::class,'listaz'])->name('fooldal');
Route::get('/felvetel', [AutoController::class,'felvetel'])->name('felvetel');
Route::post('/felvetel', [AutoController::class,'autoRogzites']);
Route::get('/modositas/{aid}',[AutoController::class,'modositas']);
Route::post('/modositas/{aid}',[AutoController::class,'modositasMentese']);
Route::post('/torles',[AutoController::class,'torles']);