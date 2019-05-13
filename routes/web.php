<?php
use App\Http\Controllers\BrowseImageController;
use Illuminate\Support\Facades\Request;

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

Route::get('/', 'BrowseImageController@browseimage');
Route::get('/search', 'searchImageController@searchimage');
Route::post('/upload', 'searchImageController@uploadfile');
