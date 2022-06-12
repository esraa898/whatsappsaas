<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class timeCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:write';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'writing current time in file every minute';

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
       return 0;
    }
}
