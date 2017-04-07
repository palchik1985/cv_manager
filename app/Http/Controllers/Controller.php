<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    
    public function store(){
        $id = request('id');
        $this->validate(request(), [
            'name' => 'required',
        ]);
        
        if(!empty($id)){
            // update
            Cv::where('id', request('id'))->update([
                'name' => request('name'),
                'json' => json_encode(request('json'))
            ]);
            return ['message' => 'updated'];
            
        } else {
            // create
            Cv::create([
                'name' => request('name'),
                'json' => json_encode(request('json')),
            ]);
    
            return ['message' => 'created'];
        }
        
    }
    
}
