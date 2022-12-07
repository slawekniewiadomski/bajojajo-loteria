<?php

namespace App\Console\Commands\Lottery;

use App\Models\Lottery;
use Illuminate\Console\Command;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:delete {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes lottery';

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
     * @return int
     */
    public function handle()
    {
        $lottery = Lottery::where('name',$this->argument('name'));
        if(!$lottery){
            $this->error('Lottery '.$this->argument('name').' doesnt exist.');
        }else{
            $lottery->delete();
        }
        return 0;
    }
}
