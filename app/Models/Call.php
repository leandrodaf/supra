<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Call extends Model
{
    use SoftDeletes;


    public $table = 'call';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at', 'date'];

    public $fillable = [
        'date'
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public static $rules = [
        'date' => 'required'
    ];

    public function aluno()
    {
        return $this->belongsToMany(\App\Models\Alunos::class)->withPivot('presence');
    }

}
