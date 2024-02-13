<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\MotivoContato;

class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
