<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


class PermissionsController extends Controller
{
    public function __construct()
    {

         $this->middleware([
            'auth:admin',
          ]);

        /*  $this->middleware(['can:read-permissions'])->only(['index']);
        $this->middleware(['can:create-permissions'])->only(['create','store']);
        $this->middleware(['can:update-permissions'])->only(['update','edit']);
        $this->middleware(['can:delete-permissions'])->only('destroy');  */
    }

    public function index()
    {
        $permissions = Permission::paginate();
        
        return view('Dashboard.Permissions.index',compact('permissions'));
    }
    
    public function create()
    {
        return view('Dashboard.Permissions.create');
    }

    public function store(Request $request)
    {
        try{
            //validation 
             $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255']);
             
             if($validator->fails())
             {
                return back()->withErrors($validator)->withInput();
             }
             $maps = ['create', 'read', 'update', 'delete'];

             foreach($maps as $key => $value){ 
             
                Permission::create([
                                'name'=>$request->name,
                                'slug'=>$value."-".strtolower(Str::plural($request->name))
                        ]);
            }
            
             return redirect()->route('permissions.index');

        }catch(\Throwable $th){
            return $th;
            abort(404);
        }
    }

    /* public function edit($id)
    {
        $permissionId = Crypt::decrypt($id);
        $permission = Permission::find($permissionId);
        return view('Dashboard.Permissions.edit', compact('permission'));
    }

    public function update(Request $request)
    {
        try{
            $permission = Permission::findOrFail($request->id);

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
             ]);
             
             if($validator->fails())
             {
                return back()->withErrors($validator)->withInput();
             }

             $permission->update($request);

             return redirect('Permissions.index');
            
        }catch(\Throwable $th){
            abort(404);
        }   
    }
 */
    public function destroy(Request $request)
    {
        Permission::find($request->id)->delete();
        return back();
    }
 }
