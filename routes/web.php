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

//Route::get('/', function () {
//
//    return view('welcome');
//});

Route::get('/', function(){
   return view('input_for_json');
});
Route::post('/', function () {
    
//    $filename = str_replace('+', '/', $filename);
//    $json = file_get_contents($filename);
//
//    if($output == 'json') {
//        header('Content-Type: json');
//        echo $json;die;
//    }
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
//Route::get('pdf/{filename}', function ($filename) {
//    $filename = str_replace('+', '/', $filename);
//    $filename = Artisan::call('cv:generate', ['json' => $filename, '--file' => true]);
////
////    $snappy = new Pdf(base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'));
////    $snappy->setOptions([
////        'margin-bottom' => 0,
////        'margin-left' => 0,
////        'margin-right' => 0,
////        'margin-top' => 0,
////    ]);
////    if(file_get_contents($filename . '.pdf')){
////        unlink($filename . '.pdf');
////    }
////    $snappy->generate(url('/test/' . $filename ), $filename . '.pdf');
//
//    return $filename . '.pdf';
//});