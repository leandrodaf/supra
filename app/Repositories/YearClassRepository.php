<?php

namespace App\Repositories;

use App\Models\YearClass;
use InfyOm\Generator\Common\BaseRepository;

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


    public function addAlunoToYearClass($request, $id)
    {
        try {
            $data = $request->all();
            $class = $this->findWithoutFail($id);
            $class->alunos()->syncWithoutDetaching($data['aluno']);

            return response(200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error in synchronize objects'
            ], 422);
        }
    }


    public function synchronizedStudents($id)
    {
        try {
            $class = $this->findWithoutFail($id);

            $data['alunos'] = $class->alunos;
            $data['schoolSubject'] = $class->schoolSubject[0]['nome'];

            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error returning students'
            ], 422);
        }
    }


    public function detachStudents($idClass, $idAluno)
    {
        try {
            $class = $this->findWithoutFail($idClass);

            $class->alunos()->detach($idAluno);

            return $idAluno;

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error removing student'
            ], 422);
        }
    }


}
