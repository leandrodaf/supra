<?php

namespace App\Repositories;

use App\Models\Alunos;
use App\YearClass;
use http\Env\Request;
use InfyOm\Generator\Common\BaseRepository;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Http\Requests\StoreAlunoMatricula;

class YearClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return YearClass::class;
    }


    public function addAlunoToYearClass(Request $request, $id)
    {

        try {
            $pessoa = $this->findWithoutFail($id);

            $data = $request->all();

            $pessoa->sync($data);

            return response(200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error in synchronize objects'
            ], 422);
        }


    }

}
