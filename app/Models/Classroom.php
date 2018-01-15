<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Classroom
 * @package App\Models
 * @version January 8, 2018, 8:28 pm -02
 *
 * @property \Illuminate\Database\Eloquent\Collection alunoEmail
 * @property \Illuminate\Database\Eloquent\Collection alunoEndereco
 * @property \Illuminate\Database\Eloquent\Collection alunoEscola
 * @property \Illuminate\Database\Eloquent\Collection alunoPessoa
 * @property \Illuminate\Database\Eloquent\Collection alunoTelefone
 * @property \Illuminate\Database\Eloquent\Collection pessoaEmail
 * @property \Illuminate\Database\Eloquent\Collection pessoaEndereco
 * @property \Illuminate\Database\Eloquent\Collection pessoaTelefone
 * @property \Illuminate\Database\Eloquent\Collection usuarioPessoas
 * @property string nome_sala
 * @property boolean status
 * @property integer capacidade
 */
class Classroom extends Model
{
    use SoftDeletes;

    public $table = 'classroom';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome_sala',
        'status',
        'capacidade'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome_sala' => 'string',
        'status' => 'boolean',
        'capacidade' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
