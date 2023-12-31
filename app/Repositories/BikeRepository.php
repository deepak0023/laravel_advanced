<?php

namespace App\Repositories;

class BikeRepository {
    protected $value;
    function __construct($value) {
        $this->value = $value;
    }
    public function horn() {
        return 'horning :'. json_encode($this->value);
    }
    public function ride() {
        return 'riding :'.json_encode($this->value);
    }
}

?>
