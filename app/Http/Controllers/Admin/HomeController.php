<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class HomeController extends Controller
{
    //
    public function index(){

       /**
        * User Auth
        */
           //$user  =  \Auth::guard('admin')->user();
        /**
         * check role of editor
        */
            // dd(\Auth::guard('admin')->user()->hasRole('editor'));

        /**
         * Assign Role to user
         * */
        // $role =  Role::where('slug','editor')->first();
        // $user->roles()->attach($role);

        /**
         * Check User Role  and Permission  using Trait class
         *
         */
        //dd($user->hasRole('author'));

        /**
         * Assign Permissions
         */
            // $permission =  Permission::find(3);
            // $user->permissions()->attach($permission);

        /**
         * Check user permission
         */
        //dd($user->hasPermission('create-post'));
        //dd($user->hasPermission($permission));

        /**
         * Check User Role and permission using provider
         */
        //check  User Role  and permission using  provider
        //dd($user->can('read-post'));
        return view('admin.dashboard');
    }

}
