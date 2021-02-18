<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserModelRequest;
use App\Http\Requests\UpdateUserModelRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Spatie\Permission\Models\Role;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepo;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the UserModel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("lister_user")) {
            $this->userRepository->pushCriteria(new RequestCriteria($request));
            $userModels = $this->userRepository->findWhere(array("type" => "admin"));

            return view('users.index')
                ->with('userModels', $userModels);
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Show the form for creating a new UserModel.
     *
     * @return Response
     */
    public function create()
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_user")) {
            return view('users.create')->with('roles', $this->roleRepository->all());
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Store a newly created UserModel in storage.
     *
     * @param CreateUserModelRequest $request
     *
     * @return Response
     */
    public function store(CreateUserModelRequest $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_user")) {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $input['debut'] = $input['hrd'].":".$input['mnd'];
            $input['fin'] = $input['hrf'].":".$input['mnf'];

            unset($input['hrd']);
            unset($input['mnd']);
            unset($input['hrf']);
            unset($input['mnf']);


            // on save le user
            $exist = $this->userRepository->findWhere(array("email" => $request->email));
            if (count($exist) == 0) {
                $user = $this->userRepository->create($input);
                // on save ses roles
                //$role = Role::create(['guard_name' => 'web', 'name' => 'super']);
                //$role = Role::create([/*'guard_name' =>'Super Admin', */'name' => 'SuperAdmin']);

                //$role = Role::create(['guard_name' =>'','name' => 'super']);

                if (isset($input['roles']) && count($input['roles']) > 0) {
                    $user->syncRoles($input['roles']);
                }
                //$user->syncRoles($input['roles']);
                Flash::success('Operation effectuée.');

                //  test log
                $this->saveLog("créer un compte le compte ".json_encode($user), " roles ".json_encode($input['roles']));

                return redirect(route('users.create'));
            } else {
                Flash::error('Email dejà utilisé.');

                //return redirect(route('users.create'));
                return redirect()->back()
                    ->withInput($request->except('password'));
            }
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Display the specified UserModel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("create_user")) {
            $userModel = $this->userRepository->findWithoutFail($id);

            if (empty($userModel)) {
                Flash::error('Aucun resultat');

                return redirect(route('users.index'));
            }

            //var_dump($userModel->getRoleNames());die();
            // var_dump($userModel->roles());die();
            return view('users.show')->with('user', $userModel)->with('roles', $userModel->getRoleNames());
            // return view('users.show')->with('user', $userModel)->with('roles', $userModel->roles());
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Show the form for editing the specified UserModel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("modif_user")) {
            $userModel = $this->userRepository->findWithoutFail($id);

            if (empty($userModel)) {
                Flash::error('Aucun resultat');

                return redirect(route('users.index'));
            }

            //return view('users.edit')->with('user', $userModel)->with('roles', $this->roleRepository->all());

            $debut = explode(":",$user->debut);
            $fin = explode(":",$user->fin);

            $hd=0;
            $md = 0;
            $hf=0;
            $mf = 0;

            if(count($debut) >=2 && count($fin) >=2){
                    $hd=$debut[0];
                    $md = $debut[1];
                    $hf=$fin[0];
                    $mf = $fin[1];
            }


            return view('users.edit')->with('user', $userModel)
            ->with("hd", $hd)
            ->with("md", $md)
            ->with("hf", $hf)
            ->with("mf", $mf)
            ->with('roles', Role::all());
        }
        else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }
    }

    /**
     * Update the specified UserModel in storage.
     *
     * @param  int $id
     * @param UpdateUserModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserModelRequest $request)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("modif_user")) {
            $userModel = $this->userRepository->findWithoutFail($id);

            if (empty($userModel)) {
                Flash::error('Aucun resultat');

                return redirect(route('users.show'));
            }

            $exist = $this->userRepository->findWhere(array("email" => $request->email));
            if (count($exist) == 0 || ($exist[0]->id == $userModel->id)) {

                $input = $request->all();

                if (!is_null($request->password) && !empty($request->password) && isset($input['password'])) {
                    //var_dump($request->password); die();
                    $input['password'] = bcrypt($request->password);
                } else {
                    unset($input['password']);
                }
                $input['debut'] = $input['hrd'].":".$input['mnd'];
                $input['fin'] = $input['hrf'].":".$input['mnf'];

                 unset($input['hrd']);
                 unset($input['mnd']);
                 unset($input['hrf']);
                 unset($input['mnf']);
                $userModel = $this->userRepository->update($input, $id);
                if (!is_null($userModel)) {
                    $userModel->syncRoles($request->roles);

                }

                Flash::success('Operation effectuée.');

                return redirect(route('users.show', $userModel->id));
            } else {
                Flash::success('Email dejà utilisé.');
                return redirect()->back()
                    ->withInput($request->except('password'));
            }
        }
        else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

    /**
     * Remove the specified UserModel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = \auth()->user();
        if ($user->hasRole('super_admin') || $user->hasPermissionTo("delete_user")) {
            $userModel = $this->userRepository->findWithoutFail($id);

            if (empty($userModel)) {
                Flash::error('Aucun resultat');

                return redirect(route('users.index'));
            }

            $this->userRepository->delete($id);

            Flash::success('Operation effectuée.');

            return redirect(route('users.index'));
        }else{
            Flash::error('Accès non authorisé');
            return back()->with("error","Accès non authorisé");
        }

    }

}

