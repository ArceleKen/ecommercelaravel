<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogRequest;
use App\Http\Requests\UpdateLogRequest;
use App\Repositories\LogRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LogController extends AppBaseController
{
    /** @var  LogRepository */
    private $logRepository;
    private $userRepository;

    public function __construct(LogRepository $logRepo, UserRepository $userRepository)
    {
        $this->logRepository = $logRepo;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the Log.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
      //  var_dump($request->all());
        $logs = array();
        if($request->date_debut != null && $request->date_fin != null){
            if($request->user_id != null)
                //$logs = $this->logRepository->findWhere([['created_at', '>=', ($request->date_debut)." 00:00:00" ], ['created_at', '<=', ($request->date_fin)." 23:59:59" ], ['user_id', '=', $request->user_id ] ] );
                $logs = $this->logRepository->findWhere([['created_at', '>=', ($request->date_debut) ], ['created_at', '<=', ($request->date_fin) ], ['user_id', '=', $request->user_id ] ] );
            else
                $logs = $this->logRepository->findWhere([['created_at', '>=', ($request->date_debut) ], ['created_at', '<=', ($request->date_fin)]] );
               // $logs = $this->logRepository->findWhere([['created_at', '>=', ($request->date_debut)." 00:00:00" ], ['created_at', '<=', ($request->date_fin)." 23:59:59" ]] );

        }
        //$this->logRepository->pushCriteria(new RequestCriteria($request));
        //$logs = $this->logRepository->all();

        return view('logs.index')
            ->with('logs', $logs)
            ->with('users', $this->userRepository->all());
    }



    /**
     * Display the specified Log.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            Flash::error('Log not found');

            return redirect(route('logs.index'));
        }

        return view('logs.show')->with('log', $log);
    }


}
