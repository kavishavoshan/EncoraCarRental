<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400);
    session_start();
}

#CHECK TRIP ADVISOR SESSION
if (isset($_SESSION["TRIP-ADVISOR"])) {
    header("Location: ../index.php");
    exit;
}

#TRIP ADVISOR CLASS
require_once "tripAdvisorLoginModel.php";

#TRIP-ADVISOR LOGIN
if (isset($_POST["trip_advisor_login"]) && $_POST["trip_advisor_login"] == "true") {

    if ($_POST["email"] == "") {
        echo "Email Address Is Empty";
    } else if (!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"])) {
        echo "Please Enter a Valid Email Address";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "Please Enter a Valid Email Address";
    } else if ($_POST["password"] == "") {
        echo "Please Enter Your Password";
    } else if (strlen($_POST["password"]) < 8) {
        echo "Password Must Be a Least 8 Characters";
    } else {
        $tripAdvisorModel = new tripAdvisorLoginModel();
        $tripAdvisorLoginRs = $tripAdvisorModel->tripAdvisorLogin($_POST["email"], $_POST["password"]);
        if ($tripAdvisorLoginRs->num_rows == 1) {
            $oneRow = $tripAdvisorLoginRs->fetch_assoc();
            $_SESSION["TRIP-ADVISOR"] = $oneRow;
            setcookie(
                'uuid',
                '5',
                time() + (24 * 60 * 60)
            );
            header("Location: ../index.php");
        } else if ($tripAdvisorLoginRs->num_rows == 0) {
            echo "Incorrect Email Or Password";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encora | Trip-Advisor Login</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-lg-6 col-12 border border-1 offset-lg-3 mt-5 mb-5">
                                    <div class="form-box">
                                        <!-- Register Form -->
                                        <div class="col-12 text-center mt-5 mb-5">
                                            <h2>Trip-Advisor Login</h2>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <img width="60%" src="../../public/image/log_vec.png" alt="">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row mx-5 p-2">
                                                <form action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="registerUsername">Username</label>
                                                        <input name="email" type="text" class="form-control" id="registerUsername">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="registerPassword">Password</label>
                                                        <input name="password" type="password" class="form-control" id="registerPassword">
                                                    </div>
                                                    <div class="form-group form-check mt-2">
                                                        <input value="true" name="rm" type="checkbox" class="form-check-input" id="rememberMe">
                                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                                    </div>
                                                    <button name="trip_advisor_login" value="true" type="submit" class="mb-5 mt-3 btn btn-warning">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>