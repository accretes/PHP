<?php
class Connection {
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            $host = "daneel";
            $database = "n00121148";
            $username = "N00121148";
            $password = "N00121148";
            
            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connection;
    }
}