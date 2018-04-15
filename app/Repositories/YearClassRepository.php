<?php

namespace App\Repositories;

use App\Models\Alunos;
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

            $data = $class->load('alunos', 'schoolSubject');

            foreach ($data->alunos as $aluno) {
                $aluno['media'] = $aluno->average($id);
            }

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

            foreach ($class->activitie as $activitie) {
                $activitie->aluno()->detach($idAluno);
            }

            $class->alunos()->detach($idAluno);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error removing student'
            ], 422);
        }
    }


    public function getAlunos($request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $class = $request->id;


            $alunos = new Alunos();

            $data = $alunos
                ->select("id", "nome_aluno")
                ->where([
                    ['nome_aluno', 'LIKE', "%$search%"]
                ])
                ->whereHas('yearClass', function ($query) use ($class) {
                    $query->where('year_class_id', $class);
                })
                ->get();
        }

        return response()->json($data);
    }


}
