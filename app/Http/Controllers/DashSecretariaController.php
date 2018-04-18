<?php

namespace App\Http\Controllers;

use App\Repositories\DashSecretariaRepository;

class DashSecretariaController extends Controller
{
    private $dashSecretariaRepository;

    public function __construct(DashSecretariaRepository $ashSecretariaRepo)
    {
        $this->middleware('auth');
        $this->dashSecretariaRepository = $ashSecretariaRepo;
    }


    public function index()
    {
        return view('dash.secretaria.index');
    }


}
