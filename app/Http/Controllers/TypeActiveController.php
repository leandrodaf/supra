<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateTypeActiveRequest;
use App\Http\Requests\UpdateTypeActiveRequest;
use App\Models\TypeActive;
use App\Repositories\TypeActiveRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Helpers\Helpers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

class TypeActiveController extends AppBaseController
{
    //

    private $typeActiveRepository;

    public function __construct(TypeActiveRepository $typeActiveRepo)
    {
        $this->middleware('auth');
        $this->typeActiveRepository = $typeActiveRepo;
    }

    public function create()
    {
        return view('typeactives.create');
    }

    public function store(CreateTypeActiveRequest $request)
    {
        $input = $request->all();

        $typeactive = $this->typeActiveRepository->create($input);

        Flash::success('Tipo de ativo salvo com sucesso.');

        return redirect(route('typeactives.index'));
    }

    public function show($id)
    {
        $typeactive = $this->typeActiveRepository->findWithoutFail($id);

        if (empty($typeactive)) {
            Flash::error('Tipo de ativo não encontrado');

            return redirect(route('typeactives.index'));
        }

        return view('typeactives.show')->with('typeactive', $typeactive);
    }

    public function edit($id)
    {
        $typeactive = $this->typeActiveRepository->findWithoutFail($id);

        if (empty($typeactive)) {
            Flash::error('Tipo de ativo não encontrado');

            return redirect(route('typeactives.index'));
        }

        return view('typeactives.edit')->with('typeactive', $typeactive);
    }

    public function update($id, UpdateTypeActiveRequest $request)
    {
        $typeactive = $this->typeActiveRepository->findWithoutFail($id);

        if (empty($typeactive)) {
            Flash::error('Tipo de ativo não encontrado');

            return redirect(route('typeactives.index'));
        }

        $typeactive = $this->typeActiveRepository->update($request->all(), $id);

        Flash::success('Tipo de Ativo atualizado com sucesso.');

        return redirect(route('typeactives.index'));
    }

    

    public function index(Request $request)
    {
        $this->typeActiveRepository->pushCriteria(new RequestCriteria($request));
        $typeactives = $this->typeActiveRepository->all();
        
        return view('typeactives.index')
            ->with('typeactives',$typeactives);
    }

    public function getTypeActivecData()
    {
        $pessoas = Pessoa::select(['id', 'nome', 'status']);

        return Datatables::of($typeActives)
            ->editColumn('status', function ($typeActive) {
                return $typeActive->status == 1 ? 'Ativo' : 'Inativo';
            })
            ->addColumn('link', function ($typeActive) {
                return '
                <a href="/typeActives/' . $typeActive->id . '' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="/typeActives/' . $typeActive->id . '/edit' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                ';
            })
            ->rawColumns(['link'])
            ->make(true);
    }

    public function destroy($id)
    {
        $typeActive = $this->typeActiveRepository->findWithoutFail($id);

        if (empty($typeActive)) {
            Flash::error('Tipo de ativo não encontrado');

            return redirect(route('typeactives.index'));
        }

        $this->typeActiveRepository->delete($id);

        Flash::success('Tipo de ativo deletado com sucesso.');

        return redirect(route('typeactives.index'));
    }





}
