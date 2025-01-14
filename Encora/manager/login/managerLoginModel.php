<?php

#DATABASE CLASS
require_once "../../db/database.php";

class managerLoginModel{

    #
    function managerLogin($email,$password){
       return Database::search("SELECT * FROM manager WHERE email='".$email."' AND password='".$password."' ");
    }

}

?>