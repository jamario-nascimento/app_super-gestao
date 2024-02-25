<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
         if($request->get('erro')=='1'){
             $erro = 'Usuário e/ou senha inválido(s)!';
         };

        return view('site.login',['titulo'=>'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
       $regras = [
           'usuario' => 'email|required',
           'senha' => 'required'
       ];

       $feedback = [
           'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
           'senha.required' => 'O campo senha é obrigatório'
       ];

       $request->validate($regras, $feedback);

       // recuperamos paramestros do request
       $email = $request->get('usuario');
       $password = $request->get('senha');

       // inicial User Model
       $user = new User();
       $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

       if(isset($usuario->name)) {
           echo 'Usuário existe';
       }else{
       return redirect()->route('site.login', ['erro' => 1]);
       }

    }
}
