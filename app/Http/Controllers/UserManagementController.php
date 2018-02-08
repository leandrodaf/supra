<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;

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
     * Display the specified Pessoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($idUser)
    {
        $user = User::find($idUser);

        $user->givePermissionTo('Administrador geral');


//        return dd($user->permissions);

        if (empty($user)) {
            $flash = new Flash();
            $flash::error('Usuário não encontrado.');

            return redirect(route('management.index'));
        }

        return view('userManagement.show')->with(compact('user'));
    }
}
