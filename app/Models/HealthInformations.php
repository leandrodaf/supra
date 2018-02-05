<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HealthInformations
 * @package App\Models
 * @version November 12, 2017, 1:02 pm -02
 *
 * @property \Illuminate\Database\Eloquent\Collection alunoEmail
 * @property \Illuminate\Database\Eloquent\Collection alunolocation
 * @property \Illuminate\Database\Eloquent\Collection alunoEscola
 * @property \Illuminate\Database\Eloquent\Collection alunoPessoa
 * @property \Illuminate\Database\Eloquent\Collection alunophone
 * @property \Illuminate\Database\Eloquent\Collection Aluno
 * @property \Illuminate\Database\Eloquent\Collection pessoaEmail
 * @property \Illuminate\Database\Eloquent\Collection pessoalocation
 * @property \Illuminate\Database\Eloquent\Collection pessoaphone
 * @property \Illuminate\Database\Eloquent\Collection usuarioPessoas
 * @property boolean sarampo
 * @property boolean rubeola
 * @property boolean catapora
 * @property boolean escarlatina
 * @property string outradoenca
 * @property boolean bronquite
 * @property boolean faltadear
 * @property boolean diabete
 * @property boolean refluxo
 * @property boolean convulsao
 * @property string medicamentotomar
 * @property boolean alergia
 * @property boolean sintomasalergia
 * @property boolean visao
 * @property boolean fala
 * @property boolean audicao
 * @property boolean edfisica
 * @property string outradeficienciax
 */
class HealthInformations extends Model
{
    use SoftDeletes;

    public $table = 'healthInformations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sarampo',
        'rubeola',
        'catapora',
        'escarlatina',
        'outradoenca',
        'bronquite',
        'faltadear',
        'diabete',
        'refluxo',
        'convulsao',
        'medicamentotomar',
        'alergia',
        'sintomasalergia',
        'visao',
        'fala',
        'audicao',
        'edfisica',
        'outradeficienciax'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sarampo' => 'boolean',
        'rubeola' => 'boolean',
        'catapora' => 'boolean',
        'escarlatina' => 'boolean',
        'outradoenca' => 'string',
        'bronquite' => 'boolean',
        'faltadear' => 'boolean',
        'diabete' => 'boolean',
        'refluxo' => 'boolean',
        'convulsao' => 'boolean',
        'medicamentotomar' => 'string',
        'alergia' => 'boolean',
        'sintomasalergia' => 'string',
        'visao' => 'boolean',
        'fala' => 'boolean',
        'audicao' => 'boolean',
        'edfisica' => 'boolean',
        'outradeficienciax' => 'string'
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
    public function alunos()
    {
        return $this->hasOne(\App\Models\Alunos::class);
    }
}
