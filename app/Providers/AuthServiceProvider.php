<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PermissionsPolicy;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         //'App\Models\Model' => 'App\Policies\ModelPolicy',
         Permission::class => PermissionsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        $users = User::with('permissions')->get();
      
        foreach($users as $key => $user){
            foreach($user->permissions as $ability => $value){
                Gate::define($value->slug, function($user){
                   return $user; 
                }); 

            }
        }
        
    }
}
