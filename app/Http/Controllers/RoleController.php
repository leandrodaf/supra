<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {

        $this->RoleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->RoleRepository->pushCriteria(new RequestCriteria($request));
        $roles = $this->RoleRepository->all();

        return view('roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("role")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->RoleRepository->create($input);

        Flash::success('Função salva com sucesso.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->RoleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Função não encontrada');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roles', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->RoleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Função não encontrada');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('roles', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->RoleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Função não encontrada');

            return redirect(route('roles.index'));
        }

        $role = $this->RoleRepository->update($request->all(), $id);

        Flash::success('Função atualizada com sucesso.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->RoleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Função não encontrada');

            return redirect(route('roles.index'));
        }

        $this->RoleRepository->delete($id);

        Flash::success('Função deletada com sucesso.');

        return redirect(route('roles.index'));
    }
}
