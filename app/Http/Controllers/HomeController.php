<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Roles;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $data;
    public function __construct()
    {
        $this->middleware('auth');
        $this->data=[];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){

        $this->data['mode']='edit';
        $users = Users::find(auth()->user()->id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
 
        return view('users.show-profile', $this->data)->with('users', $users);
    }

    public function changePassword(){

        $this->data['mode']='edit';
      
        return view('users.change-password', $this->data);
    }

}
