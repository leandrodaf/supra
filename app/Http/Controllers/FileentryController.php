<?php

namespace App\Http\Controllers;

use App\Helpers\StorageHelper;
use Illuminate\Http\Request;

class FileentryController extends Controller
{

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
