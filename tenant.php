<?php

class tenant {
    private $id;
    private $fName;
    private $lName;
    private $age;
    private $gender;
    private $email;
    private $pId;
    private $lId;
    
    
    public function __construct($id, $fn, $ln, $a, $g, $e, $p, $l) {
        $this->id = $id;
        $this->fName = $fn;
        $this->lName = $ln;
        $this->age = $a;
        $this->gender = $g;
        $this->email = $e;
        $this->pId = $p;
        $this->lId =$l; 
    }
    
    public function getTenantID() { return $this->id; }
    public function getFirstName() { return $this->fName = $fn; }
    public function getLastName() { return $this->fName = $ln; }
    public function getAge() { return $this->age = $a; }
    public function getGender() { return $this->gender = $g; }
    public function getEmail() { return $this->email = $e; }
    public function getPropertyID() { return $this->pId = $p; }
    public function getLeaseID() { return $this->lId =$l; }
}