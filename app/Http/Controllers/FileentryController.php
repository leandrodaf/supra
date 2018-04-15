<?php

namespace App\Http\Controllers;

use App\Helpers\StorageHelper;
use App\Models\Fileentry;
use App\Repositories\FileentryRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class FileentryController extends Controller
{

    private $fileentryRepository;

    public function __construct(FileentryRepository $fileentryRepo)
    {
        $this->middleware('auth');
        $this->fileentryRepository = $fileentryRepo;
    }

    public function index(Request $request)
    {

        $this->fileentryRepository->pushCriteria(new RequestCriteria($request));
        return view('fileEntrys.index');
    }

    public function getBasicData()
    {
        $fileentry = Fileentry::select(['id', 'original_filename', 'extension', 'created_at', 'filename']);

        return DataTables::of($fileentry)
            ->editColumn('created_at', function ($fileentry) {
                return $fileentry->created_at ? with(new Carbon($fileentry->created_at))->format('d/m/Y') : '';
            })
            ->addColumn('link', function ($fileentry) {
                return '<a href="/disk/file?file='.$fileentry->filename .'"> <i class="fa fa-download"></i></a>
                <a href="/disk/file/delete?file='.$fileentry->filename .'" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="" data-original-title="Excluir Documento"> <i class="fa fa-trash" style="color: rgb(203, 32, 39);"></i></a>';

            })
            ->rawColumns(['link'])
            ->make(true);
    }

    public function getFile(Request $request)
    {
        $helper = new StorageHelper();

        if ($request->has('file')) {
            return $helper->getFile($request->file);
        }
    }

    public function deleteFile(Request $request)
    {
        $helper = new StorageHelper();

        if ($request->has('file')) {
            $helper->delete($request->file);
            return redirect()->back();
        }
    }

}
