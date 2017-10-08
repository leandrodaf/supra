<?php

namespace App;

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
}
