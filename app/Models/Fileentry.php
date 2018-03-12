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
        'original_filename'
    ];


    public function activitie()
    {
        return $this->belongsTo('\App\Models\Activitie', 'activitie_id');
    }
}
