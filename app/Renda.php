<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renda extends Model
{
    protected $table='renda';
    protected  $primaryKey='renda_id';
    public $timestamps = false;
    protected $fillable=['pessoa_id','tipo_comprovante','serie_comprovante','num_comprovante','date_hora','imposto','estado'];
    protected $guarded=[

    ];
}
