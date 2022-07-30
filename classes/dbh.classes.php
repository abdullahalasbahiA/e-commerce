<?php

class Dbh{

public function connect(){
        try{
            $username = "root";
            $password = "";
            $connection = new PDO('mysql:host=localhost;dbname=e-commerce', $username, $password);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        }catch(PDOException $e){
            print "Error!: " .  $e->getMessage() . "</br>";
            die();
        }
    }
}