<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use Illuminate\Http\Request;

class FileentryController extends Controller
{

    public function getFile(Request $request)
    {

        $helper = new Helpers();

        if ($request->has('file')) {

            return $helper->getFile($request->file);

        }


    }

}
