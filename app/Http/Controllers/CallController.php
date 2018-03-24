<?php

namespace App\Http\Controllers;

use App\Repositories\CallRepository;
use Illuminate\Http\Request;

class CallController extends AppBaseController
{
    private $callRepository;

    public function __construct(CallRepository $callRepo)
    {
        $this->middleware('auth');
        $this->callRepository = $callRepo;
    }


    public function store(Request $request)
    {

        $this->callRepository->store($request);
        return redirect()->back();
    }

    public function index()
    {

    }

    public function existCall($date)
    {
        return $this->callRepository->checkDate($date);
    }

    public function update(Request $request)
    {
        $this->callRepository->checkDateUpdate($request);
        return redirect()->back();
    }
}
