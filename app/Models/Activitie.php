<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activitie extends Model
{

    use SoftDeletes;

    public $table = 'activities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [
        'deleted_at',
        'start_date',
        'end_date'
    ];


    public $fillable = [
        'title',
        'start_date',
        'end_date',
        'description',
        'yearClass_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|min:5',
        'start_date' => 'required',
        'end_date' => 'required',
        'description' => 'required|string'
    ];


    public function fileentry()
    {
        return $this->hasMany(\App\Models\Fileentry::class);
    }

    public function yearClass()
    {
        return $this->belongsTo(\App\Models\YearClass::class);
    }

    public function aluno()
    {
        return $this->belongsToMany(\App\Models\Alunos::class)->withPivot('media');
    }

}
