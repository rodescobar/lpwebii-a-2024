<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/', function() {
    return view('admin_layout.index');
});


Route::get('/categoria', [ CategoriaController::class, 'index' ]);