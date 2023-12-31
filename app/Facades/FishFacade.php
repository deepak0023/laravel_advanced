<?php

namespace App\Facades;

use App\Facades\Facade;

class FishFacade extends Facade {
    public static function getFacadeAccessor($name) {
        return 'Fish';
    }
}

?>
