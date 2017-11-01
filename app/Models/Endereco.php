<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enderecos';


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

    /**
     * GET Aluno
     */
    public function aluno()
    {
        return $this->belongsToMany('App\Models\Aluno');
    }

    /**
     * GET Pessoa
     */
    public function pessoa()
    {
        return $this->belongsToMany('App\Models\Pessoa');
    }
}
