<?php

namespace App\Repositories;

use App\Models\Alunos;
use InfyOm\Generator\Common\BaseRepository;

class DashSecretariaRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alunos::class;
    }

}
