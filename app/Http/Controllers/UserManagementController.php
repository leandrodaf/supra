<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {

        $users = User::all();

        return view('userManagement.index')->with(compact('users'));
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
