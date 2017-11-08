<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'generos';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'status'];
}
