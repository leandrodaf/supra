<?php

namespace App\Repositories;

use App\Models\Classroom;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClassroomRepository
 * @package App\Repositories
 * @version January 8, 2018, 8:28 pm -02
 *
 * @method Classroom findWithoutFail($id, $columns = ['*'])
 * @method Classroom find($id, $columns = ['*'])
 * @method Classroom first($columns = ['*'])
*/
class ClassroomRepository extends BaseRepository
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
        return Classroom::class;
    }
}
