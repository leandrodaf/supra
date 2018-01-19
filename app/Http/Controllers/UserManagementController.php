<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Flash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:Administrador geral']);
    }

    public function index(){

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

//        return dd($user->permissions);

        if (empty($user)) {
            $flash = new Flash();
            $flash::error('Usuário não encontrado.');

            return redirect(route('management.index'));
        }

        return view('userManagement.show')->with(compact('user'));
    }
}
