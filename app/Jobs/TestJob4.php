<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob4 implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // throw new \Exception("this is a sample exception");

        // check if any other job in the batch got exception
        if ($this->batch()->cancelled()) {
            info('job3 got cancelled so not moving forward');

            return;
        }

        logger('This is test job 4');
    }

    public function tags()
    {
        return ['tag_4'];
    }
}
