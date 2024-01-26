<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
//        dd($request->request->all());
        echo'<pre>';
        print_r($request->all());
        echo $request->input('nome');

        return view('site.contato',['titulo'=>'Contato']);
    }
}
