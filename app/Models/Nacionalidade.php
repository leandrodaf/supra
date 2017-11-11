<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidade extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nacionalidades';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'status'];
}
