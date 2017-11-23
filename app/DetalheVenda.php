<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalheVenda extends Model
{
    protected $table='tabela_venda';
    protected  $primaryKey='venda_tabela_id';
    public $timestamps = false;
    protected $fillable=['venda_id','artigo_id','quantidade','preco_venda','desconto'];
    protected $guarded=[

    ];
}
