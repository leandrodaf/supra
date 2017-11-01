<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emails';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email'];


    /**
     * GET Aluno
     */
    public function aluno()
    {
        return $this->belongsToMany('App\Aluno');
    }

    /**
     * GET Pessoa
     */
    public function pessoa()
    {
        return $this->belongsToMany('App\Pessoa');
    }
}
