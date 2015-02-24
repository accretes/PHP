<?php

class property {
    private $id;
    private $address;
    private $description;
    private $rent;
    private $bedrooms;
    
    
    public function __construct($id, $a, $d, $r, $b) {
        $this->id = $id;
        $this->address = $a;
        $this->description = $d;
        $this->rent = $r;
        $this->bedrooms = $b;
    }
    
    public function getID() { return $this->id; }
    public function getAddress() { return $this->address; }
    public function getDescription() { return $this->description; }
    public function getRent() { return $this->rent; }
    public function getBedrooms() { return $this->bedrooms; }
}
