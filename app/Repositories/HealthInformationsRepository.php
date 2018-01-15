<?php

namespace App\Repositories;

use App\Models\HealthInformations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HealthInformationsRepository
 * @package App\Repositories
 * @version November 12, 2017, 1:02 pm -02
 *
 * @method HealthInformations findWithoutFail($id, $columns = ['*'])
 * @method HealthInformations find($id, $columns = ['*'])
 * @method HealthInformations first($columns = ['*'])
*/
class HealthInformationsRepository extends BaseRepository
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
        return HealthInformations::class;
    }
}
