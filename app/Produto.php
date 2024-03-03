<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /* 
        Relacionamento um para um usando Eloguent ORM 
        Registro relacionado em produto_detalhes (fk) -> produto_id
        O mapeamento ocorre usando a convenção de nomes de colunas primary e foreign key
    */
    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
