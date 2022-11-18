<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
 public function Image($request, $filename,$folder)
 {
    if($request->hasFile($filename)){

        $file = $request->file($filename);
        $name = $file->getClientOriginalName();
        $file->move(public_path('uploads/images/'.$folder.''), $name);
        
    }
 }    
}
