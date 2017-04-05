<?php

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
    
    return \App\Models\Cv::all();
});

Route::get('getcv/{id}', function($id){
    
    return \App\Models\Cv::find($id)->first();
});
//Route::post('add', function () {
//    dd(request('json'));
//});
Route::post('add', 'Controller@save');

Route::get('delete/{id}', function($id){
    \App\Models\Cv::where('id', $id)->delete();
    
    return ['message' => 'deleted'];
});
