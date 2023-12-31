<?php

namespace App\Repositories;

class FishRepository {
    protected $value;
    function __construct($value) {
        $this->value = $value;
    }
    public function swim() {
        return 'swiming : '. json_encode($this->value);
    }
    public function eat() {
        return 'eating : '. json_encode($this->value);
    }
}

?>
