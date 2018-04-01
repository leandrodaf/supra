<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alunos
 * @package App\Models
 * @version November 1, 2017, 2:53 pm UTC
 *
 * @property \App\Models\TipoPessoa tipoPessoa
 * @property \Illuminate\Database\Eloquent\Collection AlunoEmail
 * @property \Illuminate\Database\Eloquent\Collection Alunolocation
 * @property \Illuminate\Database\Eloquent\Collection AlunoEscola
 * @property \Illuminate\Database\Eloquent\Collection AlunoPessoa
 * @property \Illuminate\Database\Eloquent\Collection Alunophone
 * @property \Illuminate\Database\Eloquent\Collection pessoaEmail
 * @property \Illuminate\Database\Eloquent\Collection pessoalocation
 * @property \Illuminate\Database\Eloquent\Collection pessoaphone
 * @property \Illuminate\Database\Eloquent\Collection usuarioPessoas
 * @property string nome_aluno
 * @property string foto_aluno
 * @property string rg_aluno
 * @property string sexo_aluno
 * @property boolean flg_certidao_nascimento_aluno
 * @property boolean flg_carteira_vacinacao_aluno
 * @property boolean flg_frequentou_escola_aluno
 * @property boolean flg_irmaos_aluno
 * @property boolean flg_juntos_aos_pais_aluno
 * @property integer qtd_irmaos_aluno
 * @property date data_nascimento_aluno
 * @property integer tipo_pessoas_id
 */
class Alunos extends Model
{
    use SoftDeletes;

    public $table = 'alunos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome_aluno',
        'foto_aluno',
        'rg_aluno',
        'sexo_aluno',
        'flg_certidao_nascimento_aluno',
        'flg_carteira_vacinacao_aluno',
        'flg_frequentou_escola_aluno',
        'flg_irmaos_aluno',
        'flg_juntos_aos_pais_aluno',
        'qtd_irmaos_aluno',
        'data_nascimento_aluno',
        'tipo_pessoas_id',
        'healthInformations_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome_aluno' => 'string',
        'foto_aluno' => 'string',
        'rg_aluno' => 'string',
        'sexo_aluno' => 'string',
        'flg_certidao_nascimento_aluno' => 'boolean',
        'flg_carteira_vacinacao_aluno' => 'boolean',
        'flg_frequentou_escola_aluno' => 'boolean',
        'flg_irmaos_aluno' => 'boolean',
        'flg_juntos_aos_pais_aluno' => 'boolean',
        'qtd_irmaos_aluno' => 'integer',
        'data_nascimento_aluno' => 'date',
        'tipo_pessoas_id' => 'integer',
        'healthInformations_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome_aluno' => 'required|min:3|max:255',
        'foto_aluno' => '',
        'data_nascimento_aluno' => '',
        'rg_aluno' => 'required|min:12|unique:alunos',
        'sexo_aluno' => 'required',
        'flg_certidao_nascimento_aluno' => 'required',
        'flg_carteira_vacinacao_aluno' => 'required',
        'flg_frequentou_escola_aluno' => 'required',
        'flg_irmaos_aluno' => 'required',
        'flg_juntos_aos_pais_aluno' => 'required',
        'qtd_irmaos_aluno' => 'nullable|min:1|max:10',
        'tipo_pessoas_id' => 'required'
    ];

//'email.*' => 'email|distinct|unique:alunos'

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
    public function getHealthInformation()
    {
        return $this->hasOne(
            \App\Models\HealthInformations::class,
            'id',
            'healthInformations_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function gender()
    {
        return $this->hasOne(
            \App\Models\Gender::class,
            'id',
            'sexo_aluno'
        )->select('id', 'nome');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function email()
    {
        return $this->belongsToMany(
            \App\Models\Email::class,
            'aluno_email',
            'aluno_id',
            'email_id'
        )->withPivot('flg_principal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
//    public function location()
//    {
//        return $this->belongsToMany(\App\Models\Location::class)->withPivot('location_id', 'aluno_id');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pessoa()
    {
        return $this->belongsToMany(
            \App\Models\Pessoa::class,
            'aluno_pessoa',
            'aluno_id',
            'pessoa_id'
        )->withPivot('flg_principal', 'flg_autorizado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function phone()
    {
        return $this->belongsToMany(
            \App\Models\Phone::class,
            'aluno_phone',
            'aluno_id',
            'phone_id'
        )->withPivot('flg_principal');
    }


    public function yearClass()
    {
        return $this->belongsToMany(\App\Models\YearClass::class);
    }


    public function activitie()
    {
        return $this->belongsToMany('\App\Models\Activitie')->withPivot('media');
    }

    public function call()
    {
        return $this->belongsToMany(\App\Models\Call::class)->withPivot('presence');
    }

    public function notification()
    {
        return $this->hasMany(\App\Models\Notification::class);
    }

    public function average($classid)
    {
        $media = 0.0;
        $qtdActivitie = count($this->activitie);

        foreach ($this->activitie as $activitie) {
            if ($activitie->yearClass_id == $classid && $activitie->deleted_at == null) {
                $media += $activitie->pivot->media;
            }
        }

        if ($qtdActivitie != 0) {
            return number_format($media / $qtdActivitie, 2);
        } else {
            return 0.0;
        }

    }


}
