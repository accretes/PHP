<?php

require 'ensureUserLoggedIn.php';

class PropertyTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getProperties($sortOrder, $filterName) {
        $sqlQuery = "SELECT p.*, t.Tenant_fName + ' ' + Tenant_lName as Tenant_Name"
                . "FROM properties p "
                . "LEFT JOIN tenants t ON t.Tenant_ID = p.Tenant_ID" .
                (($filterName == NULL) ? "" : "WHERE p.Property_Address LIKE :filterName") .
                 " ORDER BY " . $sortOrder;
        
        $statement = $this->connection->prepare($sqlQuery);
        if ($filterName != NULL) {
            $params = array(
                "filterName" => "%" . $filterName . "%"
            );
            $status = $statement->execute($params);
        }
        else {
            $status = $statement->execute();
        }
        
        if (!$status) {
           die("Could not retrieve properties");
        }
        
        return $statement;
    }
    
    public function getPropertiesByTenantID($tId) {
        $sqlQuery = "SELECT p.*, t.Tenant_fName + ' ' + Tenant_lName as Tenant_Name"
                . "FROM properties p "
                . "LEFT JOIN tenants t ON t.Tenant_ID = p.Tenant_ID"
                . "WHERE p.Tenant_ID = :tenantId";
        
        $params = array(
            "tenantId" => $tId
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);
        
        if (!$status) {
           die("Could not retrieve properties");
        }
        
        return $statement;
    }
    
    public function getPropertyById($id) {
        $sqlQuery = "SELECT p.*, t.Tenant_fName + ' ' + Tenant_lName as Tenant_Name"
                . "FROM properties p "
                . "LEFT JOIN tenants t ON t.Tenant_ID = p.Tenant_ID "
                . "WHERE p.Property_ID = :id";
        
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
    
    public function insertProperty($a, $d, $r, $b, $tId) {
        $sqlQuery = "INSERT INTO properties " .
                "(Property_Address, Property_Description, Property_Rent, Property_NoOfRooms, Tenant_ID) " .
                "VALUES (:address, :description, :rent, :bedrooms, :tenantId)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "description" => $d,
            "rent" => $r, 
            "bedrooms" => $b,
            "tenantId" => $tId
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
    
    public function updateProperty($id, $a, $d, $r, $b, $tId) {
        $sqlQuery = "UPDATE properties SET " .
                "Property_Address = :address, " .
                "Property_Description = :description, " . 
                "Property_Rent = :rent, " . 
                "Property_NoOfRooms = :bedrooms, " .
                "Tenant_ID = :tenantId " .
                "WHERE Property_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "description" => $d,
            "rent" => $r, 
            "bedrooms" => $b,
            "tenantId" => $tId,
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