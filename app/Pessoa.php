<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table='pessoa';
    protected  $primaryKey='pessoa_id';
    public $timestamps = false;
    protected $fillable=['tipo_pessoa','nome','tipo_documento','num_documento','direcao','telefone','email'];
    protected $guarded=[
    ];
}
