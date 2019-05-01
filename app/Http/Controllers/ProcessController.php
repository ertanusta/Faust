<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Process;

class ProcessController extends Controller
{
    public function process(Request $request){


            $text=preg_replace('/[^A-Za-z0-9\. -]/', '', $request->get('text'));
            $process=Process::create(['text'=>$text]);

            $result=Artisan::call('process:tokenizer',[
                'text'=>$text,
                'path'=>$process->id
            ]);
            $result=Artisan::call('process:stemmer',[
                'path'=>$process->id,
                'model'=>(int)$request->get('model')
            ]);

            $process=Process::find($process->id);
            $prediction=explode(",",$process->prediction);
            return redirect()->back()->withErrors("Tahminler:".
                                                            "<br>Ekonomi: ".$prediction[0].
                                                            "<br>Kültür ve Sanat: ".$prediction[1].
                                                            "<br>Magazin: ".$prediction[2].
                                                            "<br>Sağlık: ".$prediction[3].
                                                            "<br>Siyaset: ".$prediction[4].
                                                            "<br>Spor: ".$prediction[5].
                                                            "<br>Tekonoloji: ".$prediction[6]);



    }

}
