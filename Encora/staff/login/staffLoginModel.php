<?php

#DATABASE CLASS
require_once "../../db/database.php";

class staffLoginModel{

    #
    function staffLogin($email,$password){
       return Database::search("SELECT * FROM staff WHERE email='".$email."' AND password='".$password."' ");
    }

}

?>
