<?php

namespace App\Repositories;

use App\Models\Alunos;
use App\YearClass;
use InfyOm\Generator\Common\BaseRepository;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Http\Requests\StoreAlunoMatricula;

/**
 * Class AlunosRepository
 * @package App\Repositories
 * @version November 1, 2017, 2:53 pm UTC
 *
 * @method Alunos findWithoutFail($id, $columns = ['*'])
 * @method Alunos find($id, $columns = ['*'])
 * @method Alunos first($columns = ['*'])
 */
class YearClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return YearClass::class;
    }


}
