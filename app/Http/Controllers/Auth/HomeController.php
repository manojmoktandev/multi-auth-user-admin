<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class HomeController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        $user  = \Auth::user();
        //Assign Role
        // $role =  Role::where('slug','editor')->first();
        // $user->roles()->attach($role);

        // Check User Role  and Permission  using Trait class
            //check  user  has role or  not
                //dd($user->hasRole('author'));

            //Assign Permissions
            // $permission =  Permission::first();
            // $user->permissions()->attach($permission);

            //chech Assign permissions
            //dd($user->hasPermission('create-post'));
        //check  User Role  and permission using  provider
            //dd($user->can('create-post'));

        return view('dashboard');
    }

}
