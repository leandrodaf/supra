<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeActive extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_active';


    public static $rules = [
        'nome' => 'required|min:3|max:255',
        'status' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'status'];
}
