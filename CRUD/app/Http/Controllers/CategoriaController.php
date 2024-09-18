<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index() 
    {
        //Mesma coisa que SELECT * FROM categoria
        $categorias = Categoria::all();

        return view('categoria.index', compact('categorias') );
    }
}
