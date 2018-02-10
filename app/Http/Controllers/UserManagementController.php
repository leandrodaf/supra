<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\User;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Yajra\DataTables\DataTables;

class UserManagementController extends Controller
{
    use ResetsPasswords;

    /** @var  PessoaRepository */
    private $userRepository;


    public function __construct(UsersRepository $userRepo)
    {
        $this->middleware(['role:admin']);
        $this->userRepository = $userRepo;
    }

    public function index()
    {
        return view('userManagement.index');
    }


    public function edit($id)
    {

        $user = User::find($id);
        $roles = DB::table('roles')->get();
        $atualRole = null;

        foreach ($user->getRoleNames() as $role){
            $atualRole = $role;
        }


        return view('userManagement.edit')->with(compact('user', 'roles','atualRole', 'id'));
    }


    public function update(Request $request, $idUser)
    {
        $input = $request->all();

        $user = $this->userRepository->update($input, $idUser);

        $user->syncRoles($input['roles']);

        return \redirect(route('management.show', $user->id));
    }

    public function getBasicData()
    {
        $users = User::select(['id', 'name', 'email']);

        return Datatables::of($users)
//            ->addColumn('pessoa_id', function ($user) {
//                return $user->pessoa->nome;
//            })
            ->addColumn('roles', function ($user) {
                $roles = '';

                foreach ($user->getRoleNames() as $role) {
                    $roles .= $role . ', ';
                }

                return $roles;

            })
            ->addColumn('link', function ($user) {
                return '
                <a href="/management/' . $user->id . '' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="/management/' . $user->id . '/edit' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                ';
            })
            ->rawColumns(['link', 'roles'])
            ->make(true);
    }


    /**
     * Show the form for creating a new Pessoa.
     *
     * @return Response
     */
    public function create()
    {

        $roles = DB::table('roles')->get();

        return view('userManagement.create')->with(compact('roles'));
    }


    public function resetSenha(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado',
            ], 404);
        }

        $this->resetPassword($user, $data['password_again']);

        return response()->json([
            'satus' => 'Sucesso',
        ], 200);

    }


    public function store(Request $request)
    {

        $validator = validator($data = $request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pessoa_id' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $data = $request->all();

        try {

            $user = new User();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->pessoa_id = $data['pessoa_id'];
            $user->password = bcrypt($data['password']);

            $user->save();

            $user->assignRole($data['roles']);


            $flash = new Flash();
            $flash::success('Usuário criado com sucesso.');

            return redirect(route('management.show', $user->id));

        } catch (\Exception $e) {

        }

        return dd($request);
    }

    /**
     * Display the specified Pessoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($idUser)
    {
        $user = User::find($idUser);

//        return dd($user->permissions);

        if (empty($user)) {
            $flash = new Flash();
            $flash::error('Usuário não encontrado.');

            return redirect(route('management.index'));
        }

        return view('userManagement.show')->with(compact('user'));
    }
}
