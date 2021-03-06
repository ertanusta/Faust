<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class StemmerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:stemmer {path}{model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stop Words temizleme';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path=$this->argument('path');
        $model=$this->argument('model');
        $process=new Process("python3 ".public_path()."/script/web.py ".'"'.$path.'"'.' "'.$model.'"');
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result=$process->getOutput();
        $process=\App\Process::find($path);
        $process->prediction=$result;
        $process->save();


        return $process;
    }
}
