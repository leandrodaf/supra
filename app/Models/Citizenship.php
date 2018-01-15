<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizenship extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'citizenships';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'status'];
}
