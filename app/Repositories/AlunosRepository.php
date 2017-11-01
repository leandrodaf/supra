<?php

namespace App\Repositories;

use App\Models\Alunos;
use InfyOm\Generator\Common\BaseRepository;
use
    /**
     * Class AlunosRepository
     * @package App\Repositories
     * @version November 1, 2017, 2:53 pm UTC
     *
     * @method Alunos findWithoutFail($id, $columns = ['*'])
     * @method Alunos find($id, $columns = ['*'])
     * @method Alunos first($columns = ['*'])
     */
class AlunosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome_aluno',
        'foto_aluno',
        'rg_aluno',
        'sexo_aluno',
        'flg_certidao_nascimento_aluno',
        'flg_carteira_vacinacao_aluno',
        'flg_frequentou_escola_aluno',
        'flg_irmaos_aluno',
        'flg_juntos_aos_pais_aluno',
        'qtd_irmaos_aluno',
        'data_nascimento_aluno',
        'tipo_pessoas_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alunos::class;
    }

    public function uploadAvatar($avatar)
    {
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
        return $filename;
    }


}
