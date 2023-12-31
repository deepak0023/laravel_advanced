<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('type');

        if ($type == 'success') {
            $this->info('----------------------');
            $this->info('Command Successfull !!');
            $this->info('----------------------');
        } else {
            $this->info('----------------------');
            $this->info('Command Failed !!');
            $this->info('----------------------');
        }
    }
}
