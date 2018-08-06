<?php

class dbconnect {

    private $conn;
    

    function __construct() {
    }

    function connect() {
        require 'config.php';
        $server = DB_HOST;
        $user = DB_USERNAME;
        $db = DB_DATABASE;
        $pass = DB_PASSWORD;
        $currency = '&#8377; '; //currency symbol
        
        try {
            $this->conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }

        return $this->conn;
    }

}