<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores =  Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {
        $msg = '';
        // Cadastrar
        if($request->input('_token') != '' && $request->input('id') == '' ) {
            
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

        //Editar
        if($request->input('_token') != '' && $request->input('id') != '' ) {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update) {
                $msg = "Edição realizada com sucesso";
            }else{
                $msg = "Erro na edição";
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'),'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
        

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
