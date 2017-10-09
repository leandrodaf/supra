<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoas';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpfCnpj',
        'sexo',
        'rg',
        'dataNascimento',
        'estadoCivil',
        'razaoSocial',
        'nomeFantasia',
        'inscricaoEstadual',
        'nacionalidade',
        'status',
        'tipo_pessoas_id'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function getTipoPessoa()
    {
        return $this->hasOne('App\TipoPessoa', 'id', 'tipo_pessoas_id');
    }

}
