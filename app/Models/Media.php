<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    public $fillable = [
        'aluno',
        'nome_aluno',
        'media'
    ];

}
