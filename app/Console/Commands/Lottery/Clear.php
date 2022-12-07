<?php

namespace App\Console\Commands\Lottery;

use App\Models\Lottery;
use App\Models\Participant;
use App\Models\Setting;
use Illuminate\Console\Command;

class Clear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:clear {name}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears lottery draws';
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
        
        if (!$this->lottery) {
            $this->error('There is no lottery named ' . $this->argument('name') . '.');
            return 0;
        }
        
        $this->resetDraws();
        $this->activateLottery();
        return 0;
    }
    
    protected function resetDraws()
    {
        $this->line('Resetting participant draws.');
        $participants = $this->lottery->participants;
        if(!$participants){
            $this->error("Lottery ".$this->lottery->name." has no participants.");
        }else{
            $participants->each(function ($participant) {
                $participant->draw = null;
            });
            $this->info($participants->count() . ' Done.');
        }
       
    }
    
    protected function activateLottery()
    {
        $this->line('Resetting lottery status.');
        $this->lottery->active = true;
        $this->lottery->save();
        $this->info('Done.');
    }
    
    
}
