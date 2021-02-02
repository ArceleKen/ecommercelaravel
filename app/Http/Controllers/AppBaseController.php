<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Repositories\LogRepository;
use Illuminate\Support\Facades\Redirect;
use InfyOm\Generator\Utils\ResponseUtil;
use Laracasts\Flash\Flash;
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
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function checkPermission($perm)
    {
        $user = \auth()->user();
        if (!($user->hasRole('super_admin') || $user->hasPermissionTo($perm))) {
            Flash::error('Accès non authorisé');
            return false;

        }

        return true;

    }

    public function saveLog($description, $info_compl)
    {
        $user = \auth()->user();
        if ($user != null) {

            Log::create(array(
                "user_id" => $user->id,
                "description" => $description,
                "info_compl" => $info_compl
            ));


        }
    }

}
