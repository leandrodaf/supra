<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'endereco';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'cidade  ',
        'complemento',
        'bairro',
        'cidade',
        'pais'
    ];


}
