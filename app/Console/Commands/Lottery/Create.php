<?php

namespace App\Console\Commands\Lottery;

use App\Models\Lottery;
use Illuminate\Console\Command;
use Psy\Util\Str;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates lottery';

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
        $slug = \Illuminate\Support\Str::slug($this->argument('name'));
        $name = $this->argument('name');
        var_dump($slug);
        $lottery = new Lottery([
            'name' => $name,
            'slug' => $slug
        ]);
        $lottery->save();
        return 0;
    }
}
