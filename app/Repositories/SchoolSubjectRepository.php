<?php

namespace App\Repositories;

use App\Models\SchoolSubject;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SchoolSubjectRepository
 * @package App\Repositories
 * @version January 8, 2018, 8:44 pm -02
 *
 * @method SchoolSubject findWithoutFail($id, $columns = ['*'])
 * @method SchoolSubject find($id, $columns = ['*'])
 * @method SchoolSubject first($columns = ['*'])
*/
class SchoolSubjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SchoolSubject::class;
    }
}
