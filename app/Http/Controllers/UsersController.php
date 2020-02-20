<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Roles;
// use App\Models\UserRoles;
use Flash;
use Hash;
use Response;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;
    public $data;
    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->data =[];
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->usersRepository->all();
        
        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        $this->data['mode']='create';
        $roles=Roles::pluck('name','name');
        $this->data['roles']=$roles;
        return view('users.create',$this->data);
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();

        $url='';
        
        if ($request->hasFile('image_url')) {

            $url=$this->saveImage($request->file('image_url'),'users',$this->usersRepository);

        }
        $input['image_url']=$url;
        $input['password']=Hash::make($input['password']);
        unset($input['role']);
        
        $userCreate = $this->usersRepository->create($input);
        $user=$this->usersRepository->find($userCreate->id);
        $user->assignRole($request->role);
        // $roleData=['role_id'=>$request->role,'model_type'=>'App\Models\User','model_id'=>$user->id];

        // $saveRole=UserRoles::create($roleData);
        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode']='edit';
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        $roles=Roles::pluck('name','name');
        
        $this->data['roles']=$roles;

        return view('users.edit', $this->data)->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->find($id);
        $inputs=$request->all();
        
        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        if ($request->hasFile('image_url')) {

            $url=$this->saveImage($request->file('image_url'),'users',$this->usersRepository);
            $inputs['image_url']= $url;

        }
        $inputs['password']=Hash::make($inputs['password']);
        $users = $this->usersRepository->update($inputs, $id);

        $users->syncRoles([$request->role]);

        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }
    public function updateProfile($id, UpdateUsersRequest $request)
    {

        $users = $this->usersRepository->find($id);
        $inputs=$request->all();
        
        if (empty($users)) {
            
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        if ($request->hasFile('image_url')) {

            $url=$this->saveImage($request->file('image_url'),'users',$this->usersRepository);
            $inputs['image_url']= $url;

        }

        $users = $this->usersRepository->update($inputs, $id);

        Flash::success('User updated successfully.');

        return redirect()->route('home');
    }
    public function postChangePassword(){
        die('dasdassssss');
    }

}
