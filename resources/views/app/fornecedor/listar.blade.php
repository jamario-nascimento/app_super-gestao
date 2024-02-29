@extends('app.layouts.basico')

@section('titulo', 'Fornecedor - Listar')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedore - Listar</p>
        </div>
        <div class="menu">
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                Lista....
            </div>
        </div>
    </div>

@endsection