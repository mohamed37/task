<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\UserPermissionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    
Route::get('/', function(){
        return view('welcome');
});
        
Route::get('login/admin',function() {
        return view('auth.login_admin');
})->name('admin.login');
        
Route::get('login/user',function() {
        return view('auth.login');
})->name('user.login');

Route::get('register/new/user',function() {
        return view('auth.register');
});


});
Route::post('login',[LoginController::class,'login'])->name('login');
Route::post('register',[LoginController::class,'register'])->name('register');

Route::get('/logout/{type}',[LoginController::class,'logout'])->middleware('auth')->name('logout');


Route::get('lang/{locale}',[LanguagesController::class,'index']);

//______________________ADMIN____________________________

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){

        Route::get('dashboard', function(){
                return view('Dashboard.dashboard'); 
        })->name('dashboard'); 
               
        Route::resources([
                'users' => UsersController::class,
                'admins' => AdminController::class,
        
        ]); 

        Route::resource('roles',RolesController::class)->except(['show']); 
        Route::resource('permissions' , PermissionsController::class)->except(['show']); 
       
        Route::get('per/users',[UserPermissionsController::class,'index'])->name('peruser');
        Route::get('permissions_to_users',[UserPermissionsController::class,'create'])->name('add_per_user');
        Route::post('roles/insert', [UserPermissionsController::class, 'store'])->name('add_per_user.store');
        Route::get('permission/{user_id}',[UserPermissionsController::class,'destroy'])->name('permission.delete');
});

//_______________________USER___________________
Route::group(['prefix' => 'user', 'middleware' => ['auth:web']], function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
       
        Route::get('dashboard', function(){
                return view('Dashboard.dashboard'); 
        })->name('dashboard'); 


        Route::resources([
                'users' => UsersController::class,
                'admins' => AdminController::class,
        
        ]);          

});
