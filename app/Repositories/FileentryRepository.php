<?php

namespace App\Repositories;

use App\Helpers\StorageHelper;
use App\Models\Alunos;
use App\Models\Fileentry;
use InfyOm\Generator\Common\BaseRepository;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Http\Requests\StoreAlunoMatricula;
use App\Helpers\Helpers;


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
