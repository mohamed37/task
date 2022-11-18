<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;


class RolesController extends Controller
{
    public function __construct()
    {
         $this->middleware([
            'auth:admin',
           
        ]);

        /* $this->middleware(['can:read-roles'])->only(['index']);
        $this->middleware(['can:create-roles'])->only(['create','store']);
        $this->middleware(['can:update-roles'])->only(['update','edit']);
        $this->middleware(['can:delete-roles'])->only('destroy'); */ 
    }

    public function index()
    {
        $roles = Role::paginate();
        return view('Dashboard.Roles.index',compact('roles'));
    }
    
    public function create()
    {
        return view('Dashboard.Roles.create');
    }

    public function store(Request $request)
    {
        try{
            //validation 
             $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
             ]);
             
             if($validator->fails())
             {
                return back()->withErrors($validator)->withInput();
             }
             
             Role::create(['name' => $request->name,'slug' => $request->slug]);

             return redirect()->route('roles.index');

        }catch(\Throwable $th){
            abort(404);
        }
    }

    public function edit($id)
    {
        $roleId = Crypt::decrypt($id);
        $role = Role::findOrFail($roleId);
        
        return view('Dashboard.Roles.edit', compact('role'));
    }

    public function update(Request $request)
    {
        try{
            $role = Role::find($request->id);

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
             ]);
             
             if($validator->fails())
             {
                return back()->withErrors($validator)->withInput();
             }

           $role->update(['name' => $request->name,'slug' => $request->slug]);

             return redirect()->route('roles.index');
            
        }catch(\Throwable $th){
            return $th;
           
            abort(404);
        }   
    }

    public function destroy(Request $request)
    {
        Role::find($request->id)->delete();
        return back();
    }

   

}
