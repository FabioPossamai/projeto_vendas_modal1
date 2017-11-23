<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalheRenda extends Model
{
    protected $table='tabela_renda';
    protected  $primaryKey='renda_tabela_id';
    public $timestamps = false;
    protected $fillable=['renda_id','artigo_id','quantidade','preco_compra','preco_venda'];
    protected $guarded=[

    ];
}
