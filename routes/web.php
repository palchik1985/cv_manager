<?php

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

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Knp\Snappy\Pdf;



Route::get('input', function(){
    return view('input_for_json');
});
Route::post('/', function () {
    
    
    $start_array = json_decode(request('json'), true);
    if(!isset($start_array) || empty($start_array)){
        abort(404);
    }
    
    if(request('output') == 'html'){
        return view('resume', ['data' => $start_array]);
    }
    
    
    if(request('output') == 'pdf'){
        $snappy = (env('APP_ENV') == 'production') ? new Pdf('/usr/local/bin/wkhtmltopdf') : new Pdf(base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'));
        $snappy->setOptions([
            'margin-bottom' => 0,
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
        ]);
        
        $html = View::make('resume', ['data' => $start_array])->render();
        
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            [
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            ]
        );
        
    }
    
    
});
Route::get('/', function() {
   return redirect()->route('admin');
});
Route::get('admin', function(){
    return view('admin.index');
})->name('admin');

Route::get('showCv/{id}', function($id){
    $cv = \App\Models\Cv::where('id', $id)->first();
    $start_array = json_decode($cv->json, true);
    
    if(!isset($start_array) || empty($start_array)){
        abort(404);
    }
    return view('resume', ['data' => $start_array]);
    
    
});

Route::get('getPdf/{id}', function($id){
    $cv = \App\Models\Cv::where('id', $id)->first();
    $start_array = json_decode($cv->json, true);
    
    if(!isset($start_array) || empty($start_array)){
        abort(404);
    }
    
    $snappy = (env('APP_ENV') == 'production') ? new Pdf('/usr/local/bin/wkhtmltopdf') : new Pdf(base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'));
    $snappy->setOptions([
        'margin-bottom' => 0,
        'margin-left' => 0,
        'margin-right' => 0,
        'margin-top' => 0,
    ]);
    
    $html = View::make('resume', ['data' => $start_array])->render();
    
    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        [
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'attachment; filename="file.pdf"'
        ]
    );
    
});
