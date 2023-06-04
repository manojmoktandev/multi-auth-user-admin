<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Auth\Access\Response;

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
    public function adminTest(){
      /**
         * Prevent  from Auth to not get un-authorize member in this function
         *
         * Method 1
         * Authorize Method
         * \Auth::guard('admin')->user()->hasRole('admin)
         *
         * Method 2
         * Prevent from Gate Method to not get un-authorize member in function
         * \Gate::forUser(\Auth::guard('admin')->user())->allows('admin)){}
         */
        if(\Gate::forUser(\Auth::guard('admin')->user())->allows('admin')){
            dd('Admin Test');
        }
        else{
            //Response::deny('You must be an administrator.');
             abort(403);
        }
    }
    public function editorTest(){
        /**
         * Prevent  from Auth to not get un-authorize member in this function
         */
        if(\Auth::guard('admin')->user()->hasRole('editor')){
            dd('Editor Test');
        }
        else{
            abort(403);
        }

    }
    public function authorTest(){
          /**
         * Prevent  from Auth to not get un-authorize member in this controller
         */
        if(\Auth::guard('admin')->user()->hasRole('author')){
            dd('Author Test');
        }
        else{
            abort(403);
        }
    }


}
