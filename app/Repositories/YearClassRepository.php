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

    private function analisaMedias($data)
    {
        $qtdActivitie = count($data->activitie);
        $medias = collect();

        foreach ($data->activitie as $activitie) {
            foreach ($activitie->aluno as $aluno) {
                $item = $medias->where('aluno', $aluno->id);
                $media = new \App\Models\Media();

                if ($item->isNotEmpty()) {
                    $key = $item->keys()[0];
                    $base = $medias->get($key);

                    $media->aluno = $base->aluno;
                    $media->nome_aluno = $base->nome_aluno;
                    $media->foto_aluno = $base->foto_aluno;
                    $media->media = $base->media + $aluno->pivot->media;

                    $medias->forget($key);
                    $medias->push($media);
                } else {
                    $media->aluno = $aluno->id;
                    $media->nome_aluno = $aluno->nome_aluno;
                    $media->foto_aluno = $aluno->foto_aluno;
                    $media->media = $aluno->pivot->media;
                    $medias->push($media);
                }
            }
        }
        return ['alunos' => $medias, 'quantidade' => $qtdActivitie];
    }

    public function synchronizedStudents($id)
    {

        try {
            $class = $this->findWithoutFail($id);

            $data = $class->load('alunos', 'schoolSubject', 'activitie');

            return response()->json($this->analisaMedias($data));

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
