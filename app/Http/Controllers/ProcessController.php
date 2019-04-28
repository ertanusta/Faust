<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Process;

class ProcessController extends Controller
{
    public function process(Request $request){


            $text=preg_replace('/[^A-Za-z0-9\. -]/', '', $request->get('text'));
            //$text="süper toto süper liginde büyük heyecan galatasaray ile fenerbahçe arasında bugün gerçekleşecek olan müsabakaya olan heyecan büyük";
            $process=Process::create(['text'=>$text]);

            $result=Artisan::call('process:tokenizer',[
                'text'=>$text,
                'path'=>$process->id
            ]);
            $result=Artisan::call('process:stemmer',[
                'path'=>$process->id,
                'model'=>(int)$request->get('model')
            ]);
//
//            $process=Process::find($process->id);
//            return redirect()->back()->withErrors('Bulunan Kategori: '.$process->prediction);



    }

}
