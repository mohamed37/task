<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PermissionsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function hasPermssion($permissions)
    {
        
             //$role = Auth::user()->id;
            $roles = User::with('permissions')->get();

             foreach($roles as $index => $role){
             
                foreach($role->permissions as $key => $ability)
                {
                    //dd($permissions);
                    if(is_array($role->permissions) && in_array($ability, $role->permissions)){
                        return true;
                    }
                } 
            } 
                return false; 
        
    
            
    }

}
