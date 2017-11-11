<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pessoa
 * @package App\Models
 * @version October 31, 2017, 1:16 am UTC
 *
 * @property \App\Models\TipoPessoa tipoPessoa
 * @property \Illuminate\Database\Eloquent\Collection alunoEmail
 * @property \Illuminate\Database\Eloquent\Collection alunoEndereco
 * @property \Illuminate\Database\Eloquent\Collection alunoEscola
 * @property \Illuminate\Database\Eloquent\Collection AlunoPessoa
 * @property \Illuminate\Database\Eloquent\Collection alunoTelefone
 * @property \Illuminate\Database\Eloquent\Collection PessoaEmail
 * @property \Illuminate\Database\Eloquent\Collection PessoaEndereco
 * @property \Illuminate\Database\Eloquent\Collection PessoaTelefone
 * @property \Illuminate\Database\Eloquent\Collection UsuarioPessoa
 * @property string nome
 * @property string cpf_cnpj
 * @property boolean sexo
 * @property string rg
 * @property date dataNascimento
 * @property string estadoCivil
 * @property string razaoSocial
 * @property string nomeFantasia
 * @property string inscricaoEstadual
 * @property string nacionalidade
 * @property boolean status
 * @property integer tipo_pessoas_id
 */
class Pessoa extends Model
{
    use SoftDeletes;

    public $table = 'pessoas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'cpf_cnpj',
        'sexo',
        'rg',
        'dataNascimento',
        'estadoCivil',
        'razaoSocial',
        'nomeFantasia',
        'inscricaoEstadual',
        'nacionalidade',
        'status',
        'tipo_pessoas_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'cpf_cnpj' => 'string',
        'sexo' => 'integer',
        'rg' => 'string',
        'dataNascimento' => 'date',
        'estadoCivil' => 'integer',
        'razaoSocial' => 'string',
        'nomeFantasia' => 'string',
        'inscricaoEstadual' => 'string',
        'nacionalidade' => 'integer',
        'status' => 'boolean',
        'tipo_pessoas_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|min:3|max:255',
        'cpf_cnpj' => 'required|max:19|min:14',
        'sexo' => 'required|max:1',
        'rg' => 'min:12',
        'dataNascimento' => 'required|date',
        'estadoCivil' => 'required',
        'razaoSocial' => 'min:3|max:255',
        'nomeFantasia' => 'min:3|max:255',
        'inscricaoEstadual' => 'min:3|max:255',
        'nacionalidade' => 'required|max:1',
        'status' => 'required',
        'tipo_pessoas_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoPessoa()
    {
        return $this->hasOne(
            \App\Models\TipoPessoa::class,
            'id',
            'tipo_pessoas_id'
        )->select('id', 'nome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function genero()
    {
        return $this->hasOne(
            \App\Models\Genero::class,
            'id',
            'sexo'
        )->select('id', 'nome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function getEstadoCivil()
    {
        return $this->hasOne(
            \App\Models\EstadoCivil::class,
            'id',
            'estadoCivil'
        )->select('id', 'nome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function getNacionalidade()
    {
        return $this->hasOne(
            \App\Models\Nacionalidade::class,
            'id',
            'nacionalidade'
        )->select('id', 'nome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aluno()
    {
        return $this->belongsToMany(
            \App\Models\Alunos::class
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function email()
    {
        return $this->belongsToMany(
            \App\Models\Email::class
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function endereco()
    {
        return $this->belongsToMany(
            \App\Models\Endereco::class
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function telefone()
    {
        return $this->belongsToMany(
            \App\Models\Telefone::class
        );
    }
}
