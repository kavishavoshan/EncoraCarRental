<?php

#DATABASE CLASS
require_once "../../db/database.php";

class adminLoginModel{

    #
    function adminLogin($email,$password){
       return Database::search("SELECT * FROM admin WHERE email='".$email."' AND password='".$password."' ");
    }

}

?>



