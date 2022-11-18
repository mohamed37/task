<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class LanguagesController extends Controller
{
    
    public function index($locale)
    {
       App::setlocale($locale);
      session()->put('locale', $locale); 
      return redirect()->back();
    }
   
}
