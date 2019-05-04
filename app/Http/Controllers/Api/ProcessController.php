<?php

namespace App\Http\Controllers\Api;

use App\Process;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{
        public function store(Request $request){
            //return $this->respondSuccess($request->all());
             return response()->json($request->all,200);
        }
}
