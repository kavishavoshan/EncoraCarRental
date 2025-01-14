<?php

 class Database{

    private static $connection;

    private static function setupconnection(){

        Database::$connection=new mysqli("localhost","root","200227302221","ecr","3306");

    }

    public static function iud($q){
        Database::setupconnection();
        Database::$connection->query($q);
        Database::$connection->close();
    }

    public static function search($q){
        Database::setupconnection();
        $Resultset=Database::$connection->query($q);
        return $Resultset;
        Database::$connection->close();
    }

    }

?>