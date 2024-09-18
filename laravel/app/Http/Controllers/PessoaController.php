<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoa = Pessoa::all();
        dd($pessoa);
    }

    public function inserir() {
        $pessoa =  new Pessoa();
        $pessoa->pessoa_nome = "Ziguifrida da Silva";
        $pessoa->pessoa_idade = 23;
        $pessoa->pessoa_observacao = "Que nome lindo";
        $pessoa->save();
    }
}
