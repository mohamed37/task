<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\UploadTrait;

class LoginController extends Controller
{
    use AuthTrait , UploadTrait;

    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }


    public function register(Request $request)
    {
        try{
          $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'mobile' => ['required', 'numeric', 'digits:11',  'unique:users,mobile'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'avatar' => ['required', 'image', 'mimes:jpeg,jpg,png,gif','max:10000'],
            ]);

            if($validator->fails())
            {
                return back()->withErrors($validator)->withInput();
            }

            $this->Image($request,'avatar','users');

           $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->password,
                'avatar' => $request->file('avatar')->getClientOriginalName(),
            ]);
            return  redirect(RouteServiceProvider::HOME);

        }catch(\Throwable $th)
        {
            //return $th;
            abort(404);
        }
    }

    public function login(Request $request)
    {  
        try{
            //login email or mobile
            $value = $request->login;
            $field  = 'name';
            if(filter_var($value,FILTER_VALIDATE_EMAIL)){
                $field='email';
            }elseif(is_numeric($value)){ 
                $field= 'mobile';
            }
            $request->merge([$field => $value]);  
          
            //validation;
           if($request->type == 'admin')
           {
            $required = 'required|exists:admins,'.$field.'';
           }else{
            
            $required = 'required|exists:users,'.$field.'';
           }
            $validator = Validator::make($request->all(),[
                'login' => $required,
                'password' => 'required',
                'type' => 'required',
            ]);

            if($validator->fails())
            {
                return  redirect()->back()->withErrors($validator)->withInput();
            }
            
            if(Auth::guard($this->CheckGuard($request))->attempt([$field => $value, 'password' => $request->password]) )
            {    
                return $this->redirect($request);

            }
       }catch(\Throwable $th){

        //return $th;
        return back()->with(['warning' => __('messages.credentials_wrning')]);
       
       }
    }

    public function logout(Request $request, $type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

