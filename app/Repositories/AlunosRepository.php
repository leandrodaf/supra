<?php

namespace App\Repositories;

use App\Helpers\StorageHelper;
use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\StoreAlunoMatricula;
use App\Http\Requests\UpdateAlunosRequest;
use App\Models\Alunos;
use InfyOm\Generator\Common\BaseRepository;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function createAvatar(CreateAlunosRequest $request)
    {
        if ($request->hasFile('foto_aluno')) {
            $avatar = $request->file('foto_aluno');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            return $filename;
        }
    }


    public function matriculaAvatar(StoreAlunoMatricula $request)
    {
        if ($request->hasFile('foto_aluno')) {
            $avatar = $request->file('foto_aluno');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            return $filename;
        }
    }

    public function updateAvatar(UpdateAlunosRequest $request)
    {
        if ($request->hasFile('foto_aluno')) {
            $avatar = $request->file('foto_aluno');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            return $filename;
        }
    }

    public function setPhoneMain($aluno, $idPhone)
    {

        $aluno = $this->findWithoutFail($aluno);
        if (count($aluno->phone) == 1) {
            $phoneUnico = $aluno->phone->get(0);
            $phoneUnico->pivot->flg_principal = 1;
            $phoneUnico->pivot->save();
        } else {


            foreach ($aluno->phone as $phone) {
                if ($phone->id == $idPhone) {
                    $phone->pivot->flg_principal = 1;
                } else {
                    $phone->pivot->flg_principal = 0;

                }
                $phone->pivot->save();
            }
        }

        return response()->json($aluno->phone);
    }

    public function setEmailMain($alunos, $idEmail)
    {
        $alunos = $this->findWithoutFail($alunos);

        if (count($alunos->email) == 1) {
            $emailUnico = $alunos->email->get(0);
            $emailUnico->pivot->flg_principal = 1;
            $emailUnico->pivot->save();
        } else {

            foreach ($alunos->email as $email) {
                if ($email->id == $idEmail) {
                    $email->pivot->flg_principal = 1;
                } else {
                    $email->pivot->flg_principal = 0;

                }
                $email->pivot->save();
            }
        }
        return response()->json($alunos->email);
    }


    public function getAllAlunos($request, $id)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;

            $aluno = new Alunos();

            $data = $aluno
                ->select("id", "nome_aluno")
                ->where([
                    ['nome_aluno', 'LIKE', "%$search%"]
                ])
                ->whereDoesntHave('yearClass', function ($query) use ($id) {
                    $query->where('year_class_id', '=', $id);
                })
                ->limit(5)
                ->get();
        }

        return response()->json($data);
    }


    public function subQueryAlunosClass($query, $id)
    {
        $query->whereNotIn('year_class_id', $id);
    }


    public function storeDoc($request)
    {
        $helper = new StorageHelper();

        $aluno = new Alunos();
        $aluno->id = $request->alunos_id;

        if ($request->hasFile('attachedFile')) {
            $helper->saveFile($request, 'attachedFile', $aluno, 'alunos_id');
        }

//        $this->create();

    }

}
