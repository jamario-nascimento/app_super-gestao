<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request) {
        $msg = '';
        if($request->input('_token') != '') {
            
          // validacao
          $regras = [
              'nome' => 'required|min:3|max:40',
              'site' => 'url|required',
              'uf' => 'required|min:2|max:2',
              'email' => 'email|required'
          ];
          $feedback = [
              'required' => 'O campo :attribute deve ser preenchido',
              'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres',
              'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
              'uf.min' => 'O campo UF deve ter pelo menos 2 caracteres',
              'uf.max' => 'O campo UF deve ter no maximo 2 caracteres',
              'email.email' => 'O campo email deve ser um email valido'
          ];

          $request->validate($regras, $feedback);

          $fornecedor = new Fornecedor();
          $fornecedor->create($request->all());
          $msg = "Cadastro realizado com sucesso";
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
