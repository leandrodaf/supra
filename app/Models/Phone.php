<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phones';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number'];

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
