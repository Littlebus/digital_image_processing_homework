<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchImageController extends Controller
{
    public function searchimage(Request $request){
        return view('search');
    }
    public function uploadfile(Request $request){
        $res = $request->file('file')[0]->storeAs('./tmp', $request->file('file')[0]->getClientOriginalName());
        $path = getcwd().'/../storage/app/'.$res;
        $response = file_get_contents("http://127.0.0.1:4000?filepath=".$path);
        return $response;
    }
}
