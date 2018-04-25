<?php
/**
 * Created by PhpStorm.
 * User: leandro
 * Date: 23/04/18
 * Time: 19:56
 */

namespace App\Repositories;

use App\Models\Alunos;
use InfyOm\Generator\Common\BaseRepository;

class AlunosAcessoRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alunos::class;
    }


}