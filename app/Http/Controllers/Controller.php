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
    
    
    
    public function save(){
        
        $this->validate(request(), [
            'name' => 'required',
        ]);
        Cv::create([
            'name' => request('name'),
            'json' => json_encode(request('json')),
        ]);
        
        return ['message' => 'created'];
    }
}
