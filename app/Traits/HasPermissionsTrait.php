<?php
namespace App\Traits;
use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait{
    // get permission data
    public function getAllPermissions($permission){
        return Permission::whereIn('slug', $permission)->get();
    }

    // check has permissions
    public function hasPermission($permission){
        return (bool) $this->permissions->where('slug',$permission->slug)->count();
    }

    //check has role user or admin
    public function hasRole(...$roles){
        foreach($roles as $role){
            if($this->roles->contains('slug',$role)){
                return true;
            }
        }
        return false;
    }

    //find role from permission
    public function hasPermissionThroughRole($permissions){
        if(!empty($permissions->role)){
            foreach($permissions->role as $role){
                if($this->roles->contains($role)){
                    return true;
                }
            }
        }
        return false;
    }

    //give permission
    public function givePermissionTo(...$permissions){
        $permission =  $this->getAllPermissions($permissions);
        if($permission == null){
            return null;
        }
        $this->permission()->saveMany($permission);
        return $this;

    }

    // check  has permission  through Roles
    public function hasPermissionTo($permission){
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }


    // belongs users_permission
    public function permissions(){
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    // belongs to users_roles
    public function roles(){
        return $this->belongsToMany(Role::class,'users_roles');
    }

}
