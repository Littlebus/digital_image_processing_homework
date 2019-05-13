<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrowseImageController extends Controller
{
    public function browseimage(Request $request){
        $class_id = $request->input('subclass');
        $classes = DB::table('subclass')->select('class_name', 'class_id')->get();
        if(!$class_id)
            return view('browse')->withimages('')->withclasses($classes);
        else{
            $images = DB::table('birdimage')->select('file_path', 'subclass', 'class_id')->where('class_id', '=', $class_id)->get();
            return view('browse')->withimages($images)->withclasses($classes);
        }
    }
}
