<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;

Route::get('/', function () {
    return view('banner');
});

Route::get('/produtos', function() {
    return view('produtos');
});

Route::get('/pessoa',[PessoaController::class, 'index']);
