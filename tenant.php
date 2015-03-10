<?php

class tenant {
    private $id;
    private $fName;
    private $lName;
    private $age;
    private $gender;
    private $email;
    private $phone;
    private $pId;
    private $lId;
    
    
    public function __construct($id, $fn, $ln, $a, $g, $p, $e, $pid, $l) {
        $this->id = $id;
        $this->fName = $fn;
        $this->lName = $ln;
        $this->age = $a;
        $this->gender = $g;
        $this->email = $e;
        $this->phone = $p;
        $this->pId = $pid;
        $this->lId =$l; 
    }
    
    public function getTenantID() { return $this->id; }
    public function getFirstName() { return $this->fName; }
    public function getLastName() { return $this->fName; }
    public function getAge() { return $this->age; }
    public function getGender() { return $this->gender; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getPropertyID() { return $this->pId; }
    public function getLeaseID() { return $this->lId; }
}