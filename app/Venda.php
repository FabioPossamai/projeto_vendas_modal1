<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table='venda';
    protected  $primaryKey='venda_id';
    public $timestamps = false;
    protected $fillable=['cliente_id','tipo_comprovante','serie_comprovante','num_comprovante','date_hora','imposto','total_venda', 'estado'];
    protected $guarded=[

    ];
}
