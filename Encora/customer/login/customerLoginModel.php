<?php

#DATABASE CLASS
require_once "../../db/database.php";

class customerLoginModel{

    #
    function customerLogin($email,$password){
       return Database::search("SELECT * FROM customer WHERE email='".$email."' AND password='".$password."' AND status='0' ");
    }

    function customerSignupcheck($email){
        return Database::search("SELECT * FROM customer WHERE email='".$email."'");
     }

    function customerSignup($data){
        return Database::iud("INSERT INTO customer (`email`,`name`,`address`,`contact_number`,`password`,`status`) VALUES ('".$data["email"]."','".$data["fname"]." ".$data["lname"]."','".$data["addr"]."','".$data["mobile"]."','".$data["pass"]."','0')");
    } 

}

?>