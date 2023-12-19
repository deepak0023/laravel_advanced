<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class TestJob3 implements ShouldQueue
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

        // Redis::funnel('job3_lock')
        // ->limit(1)
        // ->block(10)
        // ->then(function(){
        //     sleep(5);
        //     info("running job 3");
        // });

        // Below code expects exception
        // it allow only one instance of job3 to run for 60 secconds but the other batch will only wait for 10 seconds

        Redis::throttle('job3_lock')
        ->allow(1)
        ->every(60)
        ->block(10)     // check for lock release for sec
        ->then(function(){
            sleep(5);
            info("running job 3");
        });


        // Cache::lock('job3_lock')->block(10, function() {
        //     sleep(5);
        //     info("running job 3");
        // });

        logger("This is test job 3");
    }

    public function tags() {
        return ['tag_3'];
    }
}
