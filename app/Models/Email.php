<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Email
 * @package App\Models
 * @version November 7, 2017, 12:02 pm -02
 *
 * @property \Illuminate\Database\Eloquent\Collection AlunoEmail
 * @property \Illuminate\Database\Eloquent\Collection alunoEndereco
 * @property \Illuminate\Database\Eloquent\Collection alunoEscola
 * @property \Illuminate\Database\Eloquent\Collection alunoPessoa
 * @property \Illuminate\Database\Eloquent\Collection alunoTelefone
 * @property \Illuminate\Database\Eloquent\Collection alunos
 * @property \Illuminate\Database\Eloquent\Collection PessoaEmail
 * @property \Illuminate\Database\Eloquent\Collection pessoaEndereco
 * @property \Illuminate\Database\Eloquent\Collection pessoaTelefone
 * @property \Illuminate\Database\Eloquent\Collection usuarioPessoas
 * @property string email
 */
class Email extends Model
{
    use SoftDeletes;

    public $table = 'emails';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aluno()
    {
        return $this->belongsToMany(\App\Models\Alunos::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pessoa()
    {
        return $this->belongsToMany(\App\Models\Pessoa::class);
    }

}
