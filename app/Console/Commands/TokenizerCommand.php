<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
class TokenizerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:tokenizer {text} {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kelimelerin koklerini bulur';

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
        $text=$this->argument('text');
        $path=$this->argument('path');
        $process=new Process("java -jar ".public_path()."/script/tokenizer.jar ".'"'.$text.'"'." ".'"'.$path.'"');
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}
