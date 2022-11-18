<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Admin;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:create-admins'])->only(['create','store']);
         $this->middleware(['can:read-admins'])->only(['index','show']);
        $this->middleware(['can:update-admins'])->only(['update','edit']);
        $this->middleware(['can:delete-admins'])->only('destroy');
    }

    public function index()
    {
      $admins = Admin::paginate(); 
      return view('Dashboard.admins.index', compact('admins'));
    }
    public function create()
    {
        return view('Dashboard.admins.create');
    }

    public function show($id)
    {
       $adminId = Crypt::decrypt($id);
       $admin = Admin::find($adminId);
       return view('dashboard.admins.profile',['admin'=> $admin]);
    }


    public function store(Request $request)
    {
        try{
            //validation
            $this->validate($request,[
                'name'=> 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
                'email'=> 'required|email|unique:users,email',
                'mobile'=> 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
                'password'=> 'required',
                'avatar'=> 'required|image|mimes:jpeg,jpg,png,gif|max:10000',
            ]);
            //store image
            if($request->hasFile('avatar') && $request->file('avatar')->isValid()) 
            {
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/images/admins'), $name);
            }  
            // insert data in table
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'mobile' => $request->mobile,
                'avatar' => $name,
            ]);

            return redirect()->route('admins.index');
        }catch(\Throwable $th){
            abort(404);
        }
    }

    public function edit($id)
    {
        $adminId = Crypt::decrypt($id);
        $admin = Admin::find($adminId);
       return view('dashboard.admins.edit',['admin'=> $admin]);
    }
    public function update(Request $request)
    {
        try{

            $admin = Admin::find($request->id);

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
                $imagePath = public_path('uploads/images/admins'.$admin->avatar);

                if (File::exists($imagePath)) 
                {
                    Storage::delete($imagePath);
                    
                }
                
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/images/admins'), $name);
                
                 $data['avatar'] = $name ;
            }  
            
            //update password
            if($request->has('password') && $request->password != '')
            {
                $data['password'] = $request->password;
            }
            
            // insert data in table
            $admin->update([$data]);
            
            return redirect()->route('admins.index');

        }catch(\Throwable $th){
            return $th;
            abort(404);
        }
    }
    public function destroy(Request $request)
    {
        Admin::find($request->id)->delete();
        return back();
    }
}
