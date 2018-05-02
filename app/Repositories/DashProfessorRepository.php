<?php

namespace App\Repositories;

use App\Models\Alunos;
use InfyOm\Generator\Common\BaseRepository;

class DashProfessorRepository extends BaseRepository
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
        return Alunos::class;
    }
}
