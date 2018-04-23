<?php

namespace App\Repositories;



use InfyOm\Generator\Common\BaseRepository;
use App\Models\TypeActive;

/**
 * Class MessageRepositoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TypeActiveRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $fieldSearchable = [
        'nome',
        'status'
        

    ];



    public function model()
    {
        return TypeActive::class;
    }

    

    



    /**
     * Boot up the repository, pushing criteria
     */
    //    public function boot()
    //    {
    //        $this->pushCriteria(app(RequestCriteria::class));
    //    }
}
