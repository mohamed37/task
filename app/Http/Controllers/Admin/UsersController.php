<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UsersController extends Controller
{
    public function __construct()
    {
         $this->middleware([
            'auth',
            
        ]);
         $this->middleware(['can:read-users'])->only(['index','show']);
        $this->middleware(['can:create-users'])->only(['create','store']);
        $this->middleware(['can:update-users'])->only(['update','edit']);
        $this->middleware(['can:delete-users'])->only('destroy'); 


    }

    public function index()
    {
      $users = User::where('id','<>',auth()->id())->paginate(); 
      return view('Dashboard.Users.index', compact('users'));
    }
    public function create()
    {
        return view('Dashboard.Users.create');
    }
    public function store(Request $request)
    {
        try{
            //validation
            $validator = Validator::make($request->all(),[
                'name'=> 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
                'email'=> 'required|email|unique:users,email',
                'mobile'=> 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
                'password'=> 'required',
                'avatar'=> 'sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            ]);

            if($validator->fails())
            {
               return back()->withErrors($validator)->withInput();
            }

            //store image
            if($request->hasFile('avatar') && $request->file('avatar')->isValid()) 
            {
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/images/users'), $name);
                
            }  
            // insert data in table
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'mobile' => $request->mobile,
                'avatar' => $name,
            ]);

            return redirect()->route('users.index');
        }catch(\Throwable $th){
            return $th;
            abort(404);
        }
    }
    
    public function show($id)
    {
     if($id->can('read-users')){

         $userId = Crypt::decrypt($id);
         $user = User::find($userId);
         return view('dashboard.Users.profile',['user'=> $user]);
        }
    }

    public function edit($id)
    {

       $userId = Crypt::decrypt($id);
       $user = User::find($userId);
       
       return view('dashboard.Users.edit',['user'=> $user]);
    }
    public function update(Request $request)
    {
        try{

            
            $user = User::find($request->id);

            $data = $request->except(['avatar', 'password']);
            //validation
            $this->validate($request,[
                'name'=> 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
                'email'=> 'required|email|unique:users,email,'.$request->id,
                'mobile'=> 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            //update image
            if($request->hasFile('avatar') && $request->avatar != '') 
            {
                $imagePath = public_path('uploads/images/users'.$user->avatar);

                if (File::exists($imagePath)) 
                {
                    Storage::delete($imagePath);
                    
                }
                
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/images/users'), $name);
                
                $user->update(['avatar' => $name ]);
            }  
            
            //update password
            if($request->has('password') && $request->password != '')
            {
                $data['password'] =$request->password;
            }
            // insert data in table
            $user->update([$data]);

            

            return redirect()->route('users.index');

        }catch(\Throwable $th){
            return $th;
            abort(404);
        }
    }
    public function destroy(Request $request)
    {
        User::find($request->id)->delete();
        return back();
    }
}
