<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = new Response();
        $ResponseUtil = new ResponseUtil();
        return $response::json($ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        $response = new Response();
        $ResponseUtil = new ResponseUtil();
        return $response::json($ResponseUtil::makeError($error), $code);
    }
}
