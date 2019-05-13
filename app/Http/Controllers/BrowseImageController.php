<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowseImageController extends Controller
{
    public function browseimage(Request $request){
        $subclass_id = $request->input('subclass');
        if(!$subclass_id)
            return view('browse')->withimages('');
        else{

        }
    }
}
