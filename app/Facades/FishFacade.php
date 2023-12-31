<?php

namespace App\Facades;

class FishFacade extends Facade {
    public static function getFacadeAccessor($name, $args) {
        return 'Fish';
    }
}

?>
