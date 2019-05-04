<?php

namespace App\Http\Controllers\Api;

use App\Process;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{
        public function store(Request $request){
            Process::create([
                'text'=>"android",
                'prediction'=>"0"
            ]);
            return "Text:".$request->get('text')." "."Model: ".$request->get('model');
        }
}
