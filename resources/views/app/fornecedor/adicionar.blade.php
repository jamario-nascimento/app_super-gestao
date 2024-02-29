@extends('app.layouts.basico')

@section('titulo', 'Fornecedor - adicionar')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedore - Adicionar</p>
        </div>
        <div class="menu">
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </div>
        <div class="informacao-pagina">
            {{$msg}}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') }}">
                    <small>{{ $errors->has('nome') ? $errors->first('nome') : '' }}</small>

                    <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ old('site') }}">
                    <small>{{ $errors->has('site') ? $errors->first('site') : '' }}</small>

                    <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{ old('uf') }}">
                    <small>{{ $errors->has('uf') ? $errors->first('uf') : '' }}</small>

                    <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{ old('emal') }}">
                    <small>{{ $errors->has('email') ? $errors->first('email') : '' }}</small>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection