<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    public $fillable = [
        'aluno',
        'nome_aluno',
        'media',
        'start_date',
        'end_date',
        'title',
        'description',
        'fileentry',
        'yearClass_id',
        'activitie_id'
    ];

}
