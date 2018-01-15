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
 * @property string citizenship
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
        'citizenship',
        'status',
        'tipo_pessoas_id',
        'data_admissao',
        'numero_ctps',
        'ctps_serie',
        'pis',
        'salario_base',
        'vale_refeicao',
        'plano_saude',
        'vale_transporte',
        'contato_emergencial',
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
        'citizenship' => 'integer',
        'status' => 'boolean',
        'tipo_pessoas_id' => 'integer',
        'data_admissao' => 'date',
        'numero_ctps' => 'string',
        'ctps_serie' => 'string',
        'pis' => 'string',
        'salario_base' => 'double',
        'vale_refeicao' => 'double',
        'plano_saude' => 'string',
        'vale_transporte' => 'double',
        'contato_emergencial' => 'string',
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
        'dataNascimento' => 'required',
        'estadoCivil' => 'required',
        'razaoSocial' => '',
        'nomeFantasia' => '',
        'inscricaoEstadual' => '',
        'citizenship' => 'required|max:1',
        'tipo_pessoas_id' => 'required',
        'enderecos.numero' => 'required',
        'enderecos.cep' => 'required'

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
    public function gender()
    {
        return $this->hasOne(
            \App\Models\Gender::class,
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
    public function getCitizenship()
    {
        return $this->hasOne(
            \App\Models\Citizenship::class,
            'id',
            'citizenship'
        )->select('id', 'nome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function email()
    {
        return $this->belongsToMany(
            \App\Models\Email::class,
            'pessoa_email',
            'pessoa_id',
            'email_id'
        )->withPivot('flg_principal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function endereco()
    {
        return $this->belongsToMany(
            \App\Models\Endereco::class,
            'pessoa_endereco',
            'pessoa_id',
            'endereco_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function telefone()
    {
        return $this->belongsToMany('App\Models\Telefone');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function funcao()
    {
        return $this->hasMany('App\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function setor()
    {
        return $this->hasMany('App\Models\Department');
    }

}
