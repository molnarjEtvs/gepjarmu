<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('lista');
})->name('fooldal');

Route::get('/felvetel', function () {
    return view('felvetel');
})->name('felvetel');
