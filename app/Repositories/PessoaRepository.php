<?php

namespace App\Repositories;

use App\Helpers\StorageHelper;
use App\Models\Pessoa;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PessoaRepository
 * @package App\Repositories
 * @version October 31, 2017, 1:16 am UTC
 *
 * @method Pessoa findWithoutFail($id, $columns = ['*'])
 * @method Pessoa find($id, $columns = ['*'])
 * @method Pessoa first($columns = ['*'])
 */
class PessoaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'cpf_cnpj',
        'sexo',
        'rg',
        'dataNascimento',
        'familySituation',
        'razaoSocial',
        'inscricaoEstadual',
        'citizenship',
        'status',
        'tipo_pessoas_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pessoa::class;
    }


    public function setEmailMain($pessoa, $idEmail)
    {

        $pessoa = $this->findWithoutFail($pessoa);
        if (count($pessoa->email) == 1) {
            $emailUnico = $pessoa->email->get(0);
            $emailUnico->pivot->flg_principal = 1;
            $emailUnico->pivot->save();
        } else {


            foreach ($pessoa->email as $email) {
                if ($email->id == $idEmail) {
                    $email->pivot->flg_principal = 1;
                } else {
                    $email->pivot->flg_principal = 0;

                }
                $email->pivot->save();
            }
        }
        return response()->json($pessoa->email);
    }

    public function setPhoneMain($pessoa, $idPhone)
    {
        $pessoa = $this->findWithoutFail($pessoa);
        if (count($pessoa->phone) == 1) {
            $phoneUnico = $pessoa->phone->get(0);
            $phoneUnico->pivot->flg_principal = 1;
            $phoneUnico->pivot->save();
        } else {
            foreach ($pessoa->phone as $phone) {
                if ($phone->id == $idPhone) {
                    $phone->pivot->flg_principal = 1;
                } else {
                    $phone->pivot->flg_principal = 0;
                }
                $phone->pivot->save();
            }
        }
        return response()->json($pessoa->phone);
    }


    public function getTeatcher($request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;

            $pessoa = new Pessoa();

            $data = $pessoa
                ->select("id", "nome")
                ->where([
                    ['nome', 'LIKE', "%$search%"],
                    ['tipo_pessoas_id', '=', '4']])
                ->whereHas('departments', function ($query) {
                    $query->where('department_id', 2);
                })
                ->limit(5)
                ->get();
        }

        return response()->json($data);
    }


    public function teatcherSubjetc($id)
    {
        $schoolSubjects = $this->findWithoutFail($id)->SchoolSubject;

        return $schoolSubjects;

    }

    public function storeDoc($request)
    {
        $helper = new StorageHelper();
        $pessoa = new Pessoa();
        $pessoa->id = $request->pessoa_id;

        if ($request->hasFile('attachedFile')) {
            $helper->saveFile($request, 'attachedFile', $pessoa, 'pessoa_id');
        }

    }

}
