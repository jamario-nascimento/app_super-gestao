<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /** BelongsTo (pertence à) usa o relacionamento mais fraco a chave estrangeira para a chave primária */
    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

}
