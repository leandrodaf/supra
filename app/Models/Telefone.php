<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'telefones';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['numero'];

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
