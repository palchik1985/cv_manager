<?php

use App\Models\Cv;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getlist', function(){
    
    return Cv::all();
});

Route::get('getcv/{id}', function($id){
    return Cv::where('id', $id)->first();
});

Route::post('add', 'Controller@store');

Route::get('delete/{id}', function($id){
    Cv::where('id', $id)->delete();
    
    return ['message' => 'deleted'];
});
