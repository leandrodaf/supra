<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilySituation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'familySituation';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'status'];
}
