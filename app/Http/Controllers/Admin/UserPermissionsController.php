<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Permission;

class UserPermissionsController extends Controller
{
   /* public function __construct()
   {
    $this->middleware('auth');
   }
    */
     //index
    public function index() 
    {
        $users = User::with('permissions')->get();
        return view('Dashboard.Users.Per_user',compact('users'));
    }

     //create
     public function create() 
     {
         $users = User::get();
         $permissions = Permission::get();
         return view('Dashboard.Users.addpermission',compact('users','permissions'));
     }
     //store
     public function store(Request $request)
     {
         try{
             DB::beginTransaction();
             //validation 
              $validator = Validator::make($request->all(),[
                 'user_id' => 'required|exists:users,id',
                 'permissions' => 'required|array|exists:permissions,id',
               ]);
              
              if($validator->fails())
              {
                 return back()->withErrors($validator)->withInput();
              }
 
              $user = User::find($request->user_id);
                 
              foreach($request->permissions as $key=>$permission){
                 /* DB::table('users_permissions')->insert([
                     'user_id' => $request->user_id,
                     'permission_id' => $permission 
                 ]); */
                  $user->permissions()->sync([
                     'user_id' => $request->user_id,
                     'permission_id' => $permission 
                 ]);
                 
             }
             DB::commit();
                 
              return redirect('users');
 
         }catch(\Throwable $th){
             DB::rollBack();
             //return $th;
             abort(404);
         }
     }
     
     //delete
     public function destroy($user_id)
     {
           DB::table('users_permissions')->where('user_id',$user_id)->delete();
             
           return back()->with(['error' => __('messages.delete_succ')]);
     }
 
}
