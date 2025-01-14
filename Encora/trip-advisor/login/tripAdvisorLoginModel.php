<?php

#DATABASE CLASS
require_once "../../db/database.php";

class tripAdvisorLoginModel{

    #
    function tripAdvisorLogin($email,$password){
       return Database::search("SELECT * FROM trip_advisor WHERE email='".$email."' AND password='".$password."' ");
    }

}

?>