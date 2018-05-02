<?php

namespace App\Http\Controllers;

use App\Repositories\DashProfessorRepository;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{

    private $dashProfessorRepository;

    public function __construct(DashProfessorRepository $dashprofessorRepo)
    {
        $this->middleware('auth');
        $this->dashProfessorRepository = $dashprofessorRepo;
    }

    public function index()
    {
        if (Auth::user()->hasRole('Professor')) {
            return view('dash.professor.index');
        } else {
            return redirect(Auth::user()->getRoutePanel());
        }
    }
}
