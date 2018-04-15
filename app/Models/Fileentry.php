<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    public $table = 'fileentrys';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'filename',
        'mime',
        'original_filename',
        'extension',
        'type_doc_id'
    ];


    public function activitie()
    {
        return $this->belongsTo('\App\Models\Activitie', 'activitie_id');
    }

    public function alunos()
    {
        return $this->belongsTo(\App\Models\Alunos::class, 'alunos_id');
    }

    public function pessoa()
    {
        return $this->belongsTo(\App\Models\Pessoa::class, 'pessoa_id');
    }

}
