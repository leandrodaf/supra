<?php

namespace App\Repositories;

use App\Models\Phone;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PhoneRepository
 * @package App\Repositories
 * @version November 7, 2017, 12:02 pm -02
 *
 * @method Phone findWithoutFail($id, $columns = ['*'])
 * @method Phone find($id, $columns = ['*'])
 * @method Phone first($columns = ['*'])
 */
class PhoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Phone::class;
    }

}
