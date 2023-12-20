<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $timeout = 60; // setting timeout for the job

    public $tries = 3; // tries the job three times before moving it to failed job

    public $backoff = [2, 1, 10]; // waits for 2 seconds first and 1 second and then 10 seconds for futher jobs before trying the next job in case of failure

    public $maxException = 2; // only 2 exception tries allowed before moving it to failed job

    public $shouldBeEncrypted = true; // paramter is passed in the encryted format

    public $afterCommit = true; // within a sql transaction query is commited before job is dispatched

    public $delay = 300;

    public $connection = 'redis';

    public $queue = 'job1';

    public $deleteWhenMissingModels = true; // does not throw exception if the model paramter passed to the job does not exist

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // throw new \Exception("this is a sample exception");

        logger('This is test job 1');

        // $this->release() // again run the job after certian time
    }

    public function tags()
    {
        return ['tag_1'];
    }

    /**
     * Retry the job untill specified amount of time
     * This will overwrite the $tries property on top
     *
     * @return void
     */
    public function retryUntill()
    {
        return now()->oneMinute();
    }

    /**
     * Get to this function when the job is failed on exception
     *
     * @param [type] $e
     * @return void
     */
    public function failed($e)
    {
        info('failed');
    }
}
