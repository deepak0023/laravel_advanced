<?php

namespace App\Facades;

use App\Facades\Facade;

class BikeFacade extends Facade {
    public static function getFacadeAccessor($name, $args) {
        return 'Bike';
    }
}

?>
