<?php

use App\Events\UserRegistration;
use App\Jobs\TestJob;
use App\Jobs\TestJob2;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    dump(app()); // Check for list of service provider loaded
    dump(app()->make("Hello"));
    return view('welcome');
});

Route::get('/userreg', function () {
    return view('userregistration');
});

Route::post('/userreg', function () {

    $name = request()->input('name');

    event(new UserRegistration($name));

    return view('userregistration');
});

Route::get('/test-queue', function () {
    // dispatch(function() {
    //     logger("test123");
    // });
    //->delay(now()->addMinutes(2));

    // $user = User::first();
    // dispatch(new TestJob($user));
    // TestJob::dispatch($user)->onQueue('default');
    // TestJob2::dispatch()->onQueue('high');

    // app(Pipeline::class)
    // ->send('hello world')
    // ->through([
    //     function($string, $next) {
    //         return $next(ucwords($string));
    //     },
    //     function($string, $next) {
    //         return $next($string. ": passed pipe 2");
    //     },
    //     TestJob2::class
    // ])->then(function($string) {
    //     dump($string);
    // });

    // $batch = [
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ],
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ]
    // ];

    // Bus::batch($batch)
    // ->onQueue('high')
    // ->onConnection('redis')
    // ->allowFailures()  // allow failures so that other jobs could be run [opposite of if($this->batch()->cancelled())]
    // ->catch(function($batch, $e) {
    //     logger('-----------------------------------------------');
    //     info('catched exception');
    //     logger($e);
    //     logger($batch);
    //     logger('-----------------------------------------------');
    // })
    // ->finally(function() {    // runs after all jobs are excuted successfully
    //     info('got into finally block');
    // })
    // ->then(function() {    // runs after all jobs are excuted successfully
    //     info('all jobs executed successfully');
    // })
    // ->dispatch();

    // $parallel_batch = [
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ],
    //     [
    //         new App\Jobs\TestJob3(),
    //         new App\Jobs\TestJob4()
    //     ]
    // ];

    // Bus::chain([
    //     new App\Jobs\TestJob5(),
    //     function() use ($parallel_batch) {
    //         Bus::batch($parallel_batch)->dispatch();
    //     }
    // ])->dispatch();

    App\Jobs\TestJob3::dispatch();

    dd('done');
});

Route::get('/test', function () {
    dump(app());  // Check for list of service provider loaded
    dd(storage_path('app/test.txt'));
});

Route::get('/facade', function() {
    class Fish {
        public function swim() {
            return 'swiming';
        }
        public function eat() {
            return 'eating';
        }
    }

    app()->bind('Fish', function() {
        return new Fish;
    });

    dump("Service Provider", app()->make('Fish')->swim());

    class Bike {
        public function horn() {
            return 'horning';
        }
        public function ride() {
            return 'riding';
        }
    }

    app()->bind('Bike', function() {
        return new Bike;
    });

    class Facade {
        public static function __callStatic($name, $args) {
            return app()->make(static::getFacadeAccessor($name, $args))->$name();
        }
        public static function getFacadeAccessor($name, $args) {
            //
        }
    }

    class FishFacade extends Facade {
        public static function getFacadeAccessor($name, $args) {
            return 'Fish';
        }
    }

    class BikeFacade extends Facade {
        public static function getFacadeAccessor($name, $args) {
            return 'Bike';
        }
    }

    dump("Facade", FishFacade::swim());

    dump("Bike", BikeFacade::ride());
});



Route::get('/container', function() {
    class Container {
        protected $bindings = [];

        public function bind($name, Callable $resolver) {
            $this->binding[$name] = $resolver;
        }
        public function make($name) {
            return $this->binding[$name]();
        }
    }

    $container = new Container();

    $container->bind('Game', function() {
        return 'Football';
    });

    dump("Container", $container->make('Game'));

    class Sample3 {
        public function __construct() {
        }
    }

    class Sample2 {
        public function __construct(Sample3 $sample3) {
            $this->sample3 = $sample3;
        }
    }


    class Sample1 {
        public function __construct(Sample2 $sample2) {
            $this->sample2 = $sample2;
        }
    }

    // app()->bind('Sample1', function() {
    //     return new Sample1(new Sample2(new Sample3));
    // });

    // dd(app()->make('Sample1'));

    // instead of the above ^^

    dump(resolve('Sample1'));  // does autodiscovery of class using reflection class

    // app()->bind('random', function() {
    //     return Str::random();        // creates different random string eact time
    // });

    app()->singleton('random', function() {
        return Str::random();        // gets the same random string eact time
    });

    dump(app()->make('random'));
    dump(app()->make('random'));
});
