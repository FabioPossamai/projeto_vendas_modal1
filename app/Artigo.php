<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $table='artigo';
    protected  $primaryKey='artigo_id';
    public $timestamps = false;
    protected $fillable=['categoria_id','codigo','nome','estoque','descricao','imagem','estado'];
    protected $guarded=[

    ];
}
