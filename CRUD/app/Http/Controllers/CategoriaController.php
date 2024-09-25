<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index() 
    {
        //Mesma coisa que SELECT * FROM categoria
        //Categoria::all() => Pega todas as categorias
        //Categoria::all()->where("cat_ativo", "1") => Somente ativos        
        $categorias = Categoria::where("cat_ativo", "1")->get();

        return view('categoria.index', compact('categorias') );
    }

    public function IncluirCategoria(Request $request) 
    {
        //$_POST['cat_nome']
        $cat_nome = $request->input("cat_nome");
        $cat_descricao = $request->input("cat_descricao");

        $nova = new Categoria;
        $nova->cat_nome = $cat_nome;
        $nova->cat_descricao = $cat_descricao;
        $nova->cat_ativo = 0;
        $nova->save();

        return redirect('/categoria');

        //INSERT INTO categoria (id, cat_nome, cat_descricao)
        // VALUES ( ???, 'VALOR', 'DESCRICAO')
    }

    public function ExcluirCategoria($id)
    {
        //SELECT * FROM categoria WHERE id = ID        
        $cat = Categoria::where("id", $id)->first();
        $cat->cat_ativo = 0;
        $cat->save();

        //UPDATE categoria SE cat_Ativo = 0 WHERE id=id

    }

    public function BuscarAlteracao($id) 
    {
        $categoria = Categoria::where("id", $id)->first();

        return view('categoria.alterar', compact('categoria'));
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_nome = $request->input("cat_nome");
        $dado_desc = $request->input("cat_descricao");
        $dado_id = $request->input('id');

        $categoria = Categoria::where("id", $dado_id)->first();
        $categoria->cat_nome = $dado_nome;
        $categoria->cat_descricao = $dado_desc;
        $categoria->save();

        return redirect('/categoria');
    }
}




