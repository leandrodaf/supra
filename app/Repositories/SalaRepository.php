<?php

namespace App\Repositories;

use App\Models\Sala;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SalaRepository
 * @package App\Repositories
 * @version January 8, 2018, 8:28 pm -02
 *
 * @method Sala findWithoutFail($id, $columns = ['*'])
 * @method Sala find($id, $columns = ['*'])
 * @method Sala first($columns = ['*'])
*/
class SalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome_sala',
        'status',
        'capacidade'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sala::class;
    }
}
