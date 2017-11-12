<?php

namespace App\Repositories;

use App\Models\DadosMedicos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DadosMedicosRepository
 * @package App\Repositories
 * @version November 12, 2017, 1:02 pm -02
 *
 * @method DadosMedicos findWithoutFail($id, $columns = ['*'])
 * @method DadosMedicos find($id, $columns = ['*'])
 * @method DadosMedicos first($columns = ['*'])
*/
class DadosMedicosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sarampo',
        'rubeola',
        'catapora',
        'escalartina',
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
     * Configure the Model
     **/
    public function model()
    {
        return DadosMedicos::class;
    }
}
