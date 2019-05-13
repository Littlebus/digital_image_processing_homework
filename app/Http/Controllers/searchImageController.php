<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class searchImageController extends Controller
{
    public function searchimage(Request $request){
        return view('search');
    }
    public function uploadfile(Request $request){
        $res = $request->file('file')[0]->storeAs('./tmp', 'tempimage.png');
        $path = getcwd().'/../storage/app/'.$res;
        $response = file_get_contents("http://127.0.0.1:5000?filepath=".$path);
        return $response;
        // return getcwd().'/../storage/app/'.$res;
        // return Storage::temporaryUrl($res, now()->addMinutes(1));
        // return $res;
    }
}
