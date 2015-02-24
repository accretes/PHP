<?php

require 'ensureUserLoggedIn.php';

class TenantTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getTenants() {
        $sqlQuery = "SELECT * FROM tenants";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
           die("Could not retrieve tenants");
        }
        
        return $statement;
    }
    
    public function getTenantsById($id) {
        $sqlQuery = "SELECT * FROM tenants WHERE Tenant_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve tenant");
        }
        
        return $statement;
    }
    
    public function insertTenant($fN, $lN, $a, $g, $e, $p, $pId, $l) {
        $sqlQuery = "INSERT INTO tenants " .
                "Tenant_fName, Tenant_lName, Tenant_Age, Tenant_Gender, Tenant_Email, Tenant_Phone, Property_ID, Lease_ID " .
                "VALUES (:fName, :lName, :age, :gender, :email, :phone, :propertyid, :leaseid)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "fName" => $fN, 
            "lName" => $lN, 
            "age" => $a, 
            "gender" => $g, 
            "email" => $e,
            "phone" => $p, 
            "propertyid" => $pId, 
            "leaseid" => $l
        );
        
        echo '<pre>';
        print_r($params);
        echo '</pre>';
                
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert tenant");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    public function deleteTenant($id) {
        $sqlQuery = "DELETE FROM tenants WHERE Tenant_ID = :id LIMIT 1";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete tenant");
        }
        
        return $statement;
    }
    
    public function updateTenant($fN, $lN, $a, $g, $e, $p, $pId, $l) {
        $sqlQuery = "UPDATE tenants SET " .
                "Tenant_fName = :fName, " .
                "Tenant_lName = :lName, " . 
                "Tenant_Age = :age, " . 
                "Tenant_Gender = :gender, " . 
                "Tenant_Email = :email, " . 
                "Tenant_Phone = :phone, " . 
                "Property_ID = :propertyid, " . 
                "Lease_ID = :leaseid";
        
        $statement = $this->connection->prepare($sqlQuery);
        
        $params = array(
            "fName" => $fN, 
            "lName" => $lN, 
            "age" => $a, 
            "gender" => $g, 
            "email" => $e,
            "phone" => $p, 
            "propertyid" => $pId, 
            "leaseid" => $l
        );
        
//        echo '<pre>';
//        print_r($params);
//        print_r($statement);
//        echo '</pre>';     
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not update tenant");
        }
        
        return ($statement->rowCount() == 1);
    }
}