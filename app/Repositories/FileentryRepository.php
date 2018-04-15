<?php

namespace App\Repositories;

use App\Models\Fileentry;
use InfyOm\Generator\Common\BaseRepository;


class FileentryRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fileentry::class;
    }


}
