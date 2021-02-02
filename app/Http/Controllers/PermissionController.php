<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionModelRequest;
use App\Http\Requests\UpdatePermissionModelRequest;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Spatie\Permission\Models\Permission;

class PermissionController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;
    private $user;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("lister_permission")){
            $this->permissionRepository->pushCriteria(new RequestCriteria($request));
            $permissions = $this->permissionRepository->all();

            return view('permissions.index')
                ->with('permissions', $permissions);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_permission")){

            //return view('permissions.create');
            return back()->with("error","Accès non authorisé");
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionModelRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionModelRequest $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_permission")){
            $input = $request->all();
            //$permissionModel = $this->permissionRepository->create($input);
            $check_if_exist = $this->permissionRepository->findWhere(["name"=>$request->name]);

            if ($check_if_exist->count() > 0){
                Flash::error("Cette permisssion existe deja");
                return redirect(route('permissions.create'));
            }
            $roleModel = Permission::create(["name"=>$input["name"],"description"=>$input["description"]]);

            Flash::success('Permission ajouter successfully.');

            return redirect(route('permissions.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("detail_permission")){
            $permission = $this->permissionRepository->findWithoutFail($id);

            if (empty($permission)) {
                Flash::error('cette permission n\'existe pas');

                return redirect(route('permissions.index'));
            }

            return view('permissions.show')->with('permission', $permission);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("modif_permission")) {
            $permission = $this->permissionRepository->findWithoutFail($id);

            if (empty($permission)) {
                Flash::error('cette permission n\'existe pas');

                return redirect(route('permissions.index'));
            }

            return view('permissions.edit')->with('permission', $permission);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionModelRequest $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("modif_permission")) {
            $permission = $this->permissionRepository->findWithoutFail($id);
            //dd($request["name"]);

            if (empty($permission)) {
                Flash::error('cette permission n\'existe pas');

                return redirect(route('permissions.index'));
            }

            $permissionModel = $this->permissionRepository->update(["name" => $request["name"], "description" => $request["description"]], $id);

            Flash::success('Permission mise a jour avec successfully.');

            return redirect(route('permissions.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("delete_permission")){
            $permission = $this->permissionRepository->findWithoutFail($id);

            if (empty($permission)) {
                Flash::error('cette permission n\'existe pas');

                return redirect(route('permissions.index'));
            }

            $this->permissionRepository->delete($id);

            Flash::success('Permission supprimée avec successfully.');

            return redirect(route('permissions.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }
}

