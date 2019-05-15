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
            return view('browse')->withimages('')->withclasses($classes)->withclassid('');
        else{
            $images = DB::table('birdimage')->select('file_path', 'subclass', 'class_id')->where('class_id', '=', $class_id)->get();
            foreach($images as $image){
                $file_path = $image->file_path;
                $ar = explode("/", $file_path);
                $dir = $ar[count($ar)-2];
                $name = $ar[count($ar)-1];
                $dot = strrpos($name, ".");
                $ext = substr($name, $dot+1);
                $name_ = substr($name, 0, $dot);
                $image->thumbnail_path = '/assets/img/thumbnails/'.$dir.'/'.$name_.'s.'.$ext;
            }
            return view('browse')->withimages($images)->withclasses($classes)->withclassid($class_id);
        }
    }
}
