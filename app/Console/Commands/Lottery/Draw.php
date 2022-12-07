<?php

namespace App\Console\Commands\Lottery;

use App\Models\Lottery;
use App\Models\Participant;
use App\Models\Setting;
use Illuminate\Console\Command;

class Draw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:draw {name}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets lottery draws';
    
    protected $lottery;
    
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
        $this->lottery = Lottery::where('name', $this->argument('name'))->first();
        
        if(!$this->lottery){
            $this->error('There is no lottery named ' . $this->argument('name') .'.');
            return 0;
        }
        if (!$this->lottery->active) {
            $this->error('Lottery has already been run');
            return 0;
        }
        $this->line('Creating draws.');
        $count = $this->createDraws();
        $this->info($count . " Done.");
        $this->line("Setting lottery status.");
        $this->closeLottery();
        $this->info('Done.');
        
        return 0;
    }
    
    protected function createDraws(){
        $participants = collect($this->lottery->participants);
        $participants->shuffle();
        $draws = $participants->pluck('hash');
        $last  = $draws->pop();
        $draws->prepend($last);
        foreach ($participants as $index => $participant) {
            $participant->draw = $draws[ $index ];
            $participant->save();
        }
        return $participants->count();
    }
    
    protected function closeLottery(){
        $this->lottery->active = false;
        $this->lottery->save();
    }
}
