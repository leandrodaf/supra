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
 * @property string familySituation
 * @property string razaoSocial
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
        'familySituation',
        'razaoSocial',
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
        'razaoSocial' => 'string',
        'inscricaoEstadual' => 'string',
        'status' => 'boolean',
        'citizenship' => 'integer',
        'familySituation' => 'integer',
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
        'nome' => '',
        'cpf_cnpj' => 'unique:pessoas,id',
        'sexo' => '',
        'rg' => '',
        'dataNascimento' => '',
        'familySituation' => '',
        'razaoSocial' => '',
        'inscricaoEstadual' => '',
        'citizenship' => '',
        'tipo_pessoas_id' => '',
        'enderecos.numero' => '',
        'enderecos.cep' => ''

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
    public function getFamilySituation()
    {
        return $this->hasOne(
            \App\Models\FamilySituation::class,
            'id',
            'familySituation'
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
    public function telefones()
    {
        return $this->belongsToMany('App\Models\Telefone');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function departments()
    {
        return $this->belongsToMany(
            \App\Models\Department::class,
            'pessoa_department',
            'pessoa_id',
            'department_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roles()
    {
        return $this->belongsToMany(
            \App\Models\Role::class,
            'pessoa_role',
            'pessoa_id',
            'role_id'
        );
    }


}
