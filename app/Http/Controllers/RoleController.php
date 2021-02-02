<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleModelRequest;
use App\Http\Requests\UpdateRoleModelRequest;
//use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;
    private $user;

    public function __construct(RoleRepository $roleModelRepo,Request $request)
    {

        $this->roleRepository = $roleModelRepo;
        $this->user = Auth::user();

        /* if (!$this->user->hasRole("super_admin")){
                $this->middleware(['permission:lister_roles'])->only("index");
                $this->middleware(['permission:edit_roles'])->only(["edit","update"]);
                $this->middleware(['permission:ajouter_roles'])->only(["create","store"]);
                $this->middleware(['permission:supprimer_roles'])->only("destroy");
                $this->middleware(['permission:detail_roles'])->only("show");
            }else{
                $this->middleware(['role:super_admin'])->except(["index","show"]);
            }*/
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user->hasRole("super_admin") || $user->hasPermissionTo("lister_role")){

            $this->roleRepository->pushCriteria(new RequestCriteria($request));
            $roles = $this->roleRepository->all();

            return view('roles.index')->with('roles', $roles);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_role")){
            $permissions = \App\Models\Permission::all();
            return view('roles.create', ["permissions"=>$permissions]);
        }else{


            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleModelRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleModelRequest $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_role"))
        {
            $input = $request->all();
            //$roleModel = $this->roleRepository->create($input);

            $check_if_exist = $this->roleRepository->findWhere(["name"=>$request->name]);
            $permissions = [];

            if ($check_if_exist->count() > 0){
                Flash::error("Ce role existe deja");
                return redirect(route('roles.create'));
            }
            if (isset($request->permissions))
                $permissions = $input['permissions'];
            $roles = Role::create(['name'=>$input['name'],"description"=>$input["description"]]);
            if (count($permissions)>0){
                foreach($permissions as $perm){
                    $giveperm = $roles->givePermissionTo($perm);
                }
            }
            Flash::success("Role créer avec succès.");

            //$roleModel = $this->roleRepository->create($input);

            return redirect(route('roles.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("detail_role")){
            $roleModel = $this->roleRepository->findWithoutFail($id);

            if (empty($roleModel)) {
                Flash::error('ce role n\'existe pas');

                return redirect(route('roles.index'));
            }
            Flash::success('role ajpouté avec succès.');
            $permissions = $roleModel->permissions()->get();

            return view('roles.show')->with(['role'=> $roleModel,"permissions"=>$permissions]);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("modif_role")){
            //$roleModel = $this->roleRepository->findWithoutFail($id);
            $roleModel = Role::findById($id,null);
            if (empty($roleModel)) {
                Flash::error('ce role n\'existe pas');
                return redirect(route('roles.index'));
            }
            $permissions = Permission::all();
            return view('roles.edit')->with(['role'=> $roleModel,"permissions"=>$permissions]);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleModelRequest $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("modif_role")){
            //$roleModel = $this->roleRepository->findWithoutFail($id);
            $roleModel = Role::findById($id,null);

            if (empty($roleModel)) {
                Flash::error('ce role n\'existe pas');

                return redirect(route('roles.index'));
            }
            $roleEdited = $this->roleRepository->update(["name"=>$request->name,"description"=>$request->description], $id);
            if (isset($request->permissions))
                $roleModel->syncPermissions($request->permissions);

            Flash::success('Mise a jour du role avec succès.');


            return redirect(route('roles.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("delete_role")){
            $roleModel = $this->roleRepository->findWithoutFail($id);

            if (empty($roleModel)) {
                Flash::error('ce role n\'existe pas');

                return redirect(route('roles.index'));
            }

            $this->roleRepository->delete($id);

            Flash::success('ce role a été supprimé avec succès');

            return redirect(route('roles.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

}