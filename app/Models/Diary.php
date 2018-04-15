<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    public $table = 'diary';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'date',
        'flg_atention',
        'flg_discipline',
        'flg_humor',
        'description',
        'user_id',
        'alunos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'flg_atention' => 'integer',
        'flg_discipline' => 'integer',
        'flg_humor' => 'integer',
        'description' => 'string',
        'user_id' => 'integer',
        'alunos_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'flg_atention' => 'required',
        'flg_discipline' => 'required',
        'flg_humor' => 'required',
        'description' => '',
        'user_id' => 'required',
    ];

    public function user()
    {
        return $this->hasMany(\App\User::class, 'id', 'user_id');
    }

    public function alunos()
    {
        return $this->hasMany(\App\Models\Alunos::class, 'id', 'alunos_id');
    }

}
