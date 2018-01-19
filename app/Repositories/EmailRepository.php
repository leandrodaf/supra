<?php

namespace App\Repositories;

use App\Models\Email;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmailRepository
 * @package App\Repositories
 * @version November 7, 2017, 12:02 pm -02
 *
 * @method Email findWithoutFail($id, $columns = ['*'])
 * @method Email find($id, $columns = ['*'])
 * @method Email first($columns = ['*'])
*/
class EmailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Email::class;
    }

}
