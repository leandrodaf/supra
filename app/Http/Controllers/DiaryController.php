<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiaryRequest;
use App\Models\Diary;
use App\Repositories\DiaryRepository;
use Illuminate\Http\Request;

class DiaryController extends Controller
{

    /** @var  EmailRepository */
    private $diaryRepository;

    public function __construct(DiaryRepository $diaryRepo)
    {
        $this->middleware('auth');
        $this->diaryRepository = $diaryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('date')) {
            $diary = Diary::whereDate('date', $request->date)->where('user_id', $request->user_id)->get();

            if (count($diary) != 0) {
                return response()->json($diary, 201);
            } else {
                return response()->json(['status' => false], 200);
            }

        } else {
            return response()->json(['message' => 'Diary not found!']);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiaryRequest $request)
    {
        $diary = $request->all();

        $store = \App\Models\Diary::updateOrCreate(
            ['date' => $diary['date'], 'user_id' => $diary['user_id']],
            $diary);


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
