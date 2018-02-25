<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolSubjectRequest;
use App\Http\Requests\UpdateSchoolSubjectRequest;
use App\Repositories\SchoolSubjectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SchoolSubjectController extends AppBaseController
{
    /** @var  SchoolSubjectRepository */
    private $schoolSubjectRepository;

    public function __construct(SchoolSubjectRepository $schoolSubjectRepo)
    {

        $this->schoolSubjectRepository = $schoolSubjectRepo;
    }

    /**
     * Display a listing of the Materia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->schoolSubjectRepository->pushCriteria(new RequestCriteria($request));
        $schoolSubjects = $this->schoolSubjectRepository->all();

        return view('schoolsubject.index')
            ->with('schoolSubjects', $schoolSubjects);
    }


    public function teacherAll(Request $request, $idPessoa)
    {
        if ($idPessoa != null) {
            try {
                $pessoa = \App\Models\Pessoa::find($idPessoa);

                return response()->json($pessoa->schoolSubject);


            } catch (\Exception $e) {
                return response()->json(array("message" => "Person not found"));
            }

        } else {
            return response()->json(array("message" => "Something went wrong."));
        }
    }

    public function teacherAdd(Request $request, $idPessoa)
    {


        if ($idPessoa != null) {
            try {
                $pessoa = \App\Models\Pessoa::find($idPessoa);
                $pessoa->schoolSubject()->syncWithoutDetaching($request->input('subjects'));

                return response('Successfully updated', 200);

            } catch (\Exception $e) {
                return response()->json(array("message" => "Person not found"));
            }

        } else {
            return response()->json(array("message" => "Something went wrong."));
        }
    }

    public function teacherRemove(Request $request, $idPessoa)
    {
        if ($idPessoa != null) {
            try {
                $pessoa = \App\Models\Pessoa::find($idPessoa);
                $pessoa->schoolSubject()->detach($request->input('subjects'));
            } catch (\Exception $e) {
                return response()->json(array("message" => "Person not found"));
            }

        } else {
            return response()->json(array("message" => "Something went wrong."));
        }
    }

    /**
     * Show the form for creating a new Materia.
     *
     * @return Response
     */
    public function create()
    {
        return view('schoolsubject.create');
    }

    /**
     * Store a newly created Materia in storage.
     *
     * @param CreateSchoolSubjectRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolSubjectRequest $request)
    {
        $input = $request->all();

        $schoolSubject = $this->schoolSubjectRepository->create($input);

        Flash::success('Materia salva com sucesso.');

        return redirect(route('schoolsubject.index'));
    }

    /**
     * Display the specified Materia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $schoolSubject = $this->schoolSubjectRepository->findWithoutFail($id);

        if (empty($schoolSubject)) {
            Flash::error('Materia não encontrada');

            return redirect(route('schoolsubject.index'));
        }

        return view('schoolsubject.show')->with('schoolSubjectRepository', $schoolSubject);
    }

    /**
     * Show the form for editing the specified Materia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $schoolSubject = $this->schoolSubjectRepository->findWithoutFail($id);

        if (empty($schoolSubject)) {
            Flash::error('Materia não encontrada');

            return redirect(route('schoolsubject.index'));
        }

        return view('schoolsubject.edit')->with('schoolSubject', $schoolSubject);
    }

    /**
     * Update the specified Materia in storage.
     *
     * @param  int $id
     * @param UpdateSchoolSubjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolSubjectRequest $request)
    {
        $schoolSubject = $this->schoolSubjectRepository->findWithoutFail($id);

        if (empty($schoolSubject)) {
            Flash::error('Materia não encontrada');

            return redirect(route('schoolsubject.index'));
        }

        $schoolSubject = $this->schoolSubjectRepository->update($request->all(), $id);

        Flash::success('Materia atualizada com sucesso.');

        return redirect(route('schoolsubject.index'));
    }

    /**
     * Remove the specified Materia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schoolSubject = $this->schoolSubjectRepository->findWithoutFail($id);

        if (empty($schoolSubject)) {
            Flash::error('Materia não encontrada.');

            return redirect(route('schoolsubject.index'));
        }

        $this->schoolSubjectRepository->delete($id);

        Flash::success('Materia deletada com sucesso.');

        return redirect(route('schoolsubject.index'));
    }
}
