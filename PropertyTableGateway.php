<?php

require 'ensureUserLoggedIn.php';

class PropertyTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getProperties() {
        $sqlQuery = "SELECT * FROM properties";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
           die("Could not retrieve properties");
        }
        
        return $statement;
    }
    
    public function getPropertiesByTenantID() {
        $sqlQuery = "SELECT * FROM properties";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
           die("Could not retrieve properties");
        }
        
        return $statement;
    }
    
    public function getPropertyById($id) {
        $sqlQuery = "SELECT * FROM properties WHERE Property_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve property");
        }
        
        return $statement;
    }
    
    public function insertProperty($a, $d, $r, $b) {
        $sqlQuery = "INSERT INTO properties " .
                "(Property_Address, Property_Description, Property_Rent, Property_NoOfRooms) " .
                "VALUES (:address, :description, :rent, :bedrooms)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "description" => $d,
            "rent" => $r, 
            "bedrooms" => $b
        );
        
        echo '<pre>';
        print_r($params);
        echo '</pre>';
                
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert property");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    public function deleteProperty($id) {
        $sqlQuery = "DELETE FROM properties WHERE Property_ID = :id LIMIT 1";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete property");
        }
        
        return $statement;
    }
    
    public function updateProperty($id, $a, $d, $r, $b) {
        $sqlQuery = "UPDATE properties SET " .
                "Property_Address = :address, " .
                "Property_Description = :description, " . 
                "Property_Rent = :rent, " . 
                "Property_NoOfRooms = :bedrooms " .
                "WHERE Property_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "description" => $d,
            "rent" => $r, 
            "bedrooms" => $b,
            "id" => $id
        );
        
//        echo '<pre>';
//        print_r($params);
//        print_r($statement);
//        echo '</pre>';     
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert property");
        }
        
        return ($statement->rowCount() == 1);
    }
}