<?php 

namespace App\Traits;

use App\Providers\RouteServiceProvider;
use illuminate\Support\Facades\Auth;

trait AuthTrait
{

    public function CheckGuard($request)
    {
        if($request->type == 'admin')
        {
            $guardName = 'admin';
        }else{
         
            $guardName = 'web';

        }

        return $guardName;
    }

    public function redirect($request)
    {
        if($request->type === 'admin' && Auth::guard('admin')->check())
        {
            return redirect(RouteServiceProvider::DASHBOARD);
        }else{
            return redirect()->route('dashboard');
            //  return redirect(RouteServiceProvider::HOME);
        }
    }
}


?>