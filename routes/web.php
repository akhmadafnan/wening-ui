<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'shell')->name('shell');
Route::view('/tokens', 'baseline')->name('tokens');
