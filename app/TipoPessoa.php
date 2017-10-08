<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPessoa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_pessoas';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'status'];

}
