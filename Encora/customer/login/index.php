<?php
#START SESSION
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400);
    session_start();
}

#CHECK CUSTOMER SESSION
if (isset($_SESSION["CUSTOMER"])) {
    header("Location: ../index.php");
    exit;
}

#CUSTOMER CLASS
require_once "customerLoginModel.php";

#XCUSTOMER LOGIN
if (isset($_POST["customer_login"]) && $_POST["customer_login"] == "true") {

    if ($_POST["email"] == "") {
        echo "Email Address Is Empty";
    } else if (!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"])) {
        echo "Please Enter a Valid Email Address";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "Please Enter a Valid Email Address";
    } else if ($_POST["pass"] == "") {
        echo "Please Enter Your Password";
    } else if (strlen($_POST["pass"]) < 8) {
        echo "Password Must Be a Least 8 Characters";
    } else {
        $customerModel = new customerLoginModel();
        $customerLoginRs = $customerModel->customerLogin($_POST["email"], $_POST["pass"]);
        if ($customerLoginRs->num_rows == 1) {
            $oneRow = $customerLoginRs->fetch_assoc();
            $_SESSION["CUSTOMER"] = $oneRow;
            setcookie(
                'uuid',
                '2',
                time() + (24 * 60 * 60)
            );
            if ($_GET["rm"] == "true") {
                setcookie(
                    'email',
                    '".$oneRow["email"]."',
                    time() + (24 * 60 * 60)
                );
                setcookie(
                    'password',
                    '".$oneRow["password"]."',
                    time() + (24 * 60 * 60)
                );
            }
            header("Location: ../index.php");
            exit;
        } else if ($customerLoginRs->num_rows == 0) {
            echo "Incorrect Email Or Password";
        }
    }
}

#XCUSTOMER SIGNUP
if (isset($_POST["customer_signup"]) && $_POST["customer_signup"] == "true") {

    if ($_POST["fname"] == "") {
        echo "First Name is Empty";
    } else if ($_POST["lname"] == "") {
        echo "Last Name is Empty";
    } else if ($_POST["addr"] == "") {
        echo "Address Field is Empty";
    } else if ($_POST["mobile"] == "") {
        echo "Mobile Field is Empty";
    } else if ($_POST["email"] == "") {
        echo "Email Address Is Empty";
    } else if (!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"])) {
        echo "Please Enter a Valid Email Address";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "Please Enter a Valid Email Address";
    } else if ($_POST["uname"] == "") {
        echo "Username is Empty";
    } else if ($_POST["pass"] == "") {
        echo "Please Enter Your Password";
    } else if (strlen($_POST["pass"]) < 8) {
        echo "Password Must Be a Least 8 Characters";
    } else {
        $customerModel = new customerLoginModel();
        $customerSignupRs = $customerModel->customerSignupcheck($_POST["email"]);
        if ($customerSignupRs->num_rows == 1) {
            echo "User Already exsits";
        } else if ($customerSignupRs->num_rows == 0) {

            $customerModel = new customerLoginModel();
            $customerSignup = $customerModel->customerSignup($_POST);

            echo 'Successfully Sign Up.. Please Log In With Your Email and Password';
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
    <title>Encora | Customer Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\..\public\css\customer.css">
    <link rel="stylesheet" href="../../public/css/bootstrap.css" />
</head>

<body>

    <header class="container-fluid">

        <div class="row">
            <div class="col text-center header-top">
                <h6>Car Rental Application</h6>
            </div>
        </div>

        <div class="row align-items-center header-top-2">
            <div class="col-6">
                <img src="..\..\public\image\logo\Screenshot__130_-removebg-previewlogo.png" alt="Company Logo" class="logo" width="120" height="70">
                <label class="company-name">Encora</label>

            </div>
        </div>




    </header>



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-box">
                    <!-- Register Form -->
                    <div class="text-center">
                        <h2><b>Login</b></h2>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="registerUsername">Username</label>
                            <input name="email" type="text" class="form-control" id="registerUsername">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input name="pass" type="password" class="form-control" id="registerPassword">
                        </div>
                        <div class="form-group form-check">
                            <input value="true" name="rm" type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>
                        <button name="customer_login" value="true" type="submit" class="btn btn-warning">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-box">
                    <!-- Login Form -->
                    <div class="text-center">
                        <h2><b>Create an account</b></h2>
                    </div>
                    <form action="" method="POST">


                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" id="addr" name="addr">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="uname" name="uname">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" id="cpass" name="cpass">
                        </div>

                        <button name="customer_signup" value="true" type="submit" class="btn btn-warning">creat your account</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-row mt-5">
            <div class="container text-center mt-3">
                <a href="#">Contact</a> | <a href="#">About</a> | <a href="#">Home</a> | <a href="#">Help</a>
            </div>
        </div>
        <div class=" footer-row">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <p class="footer-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="footer-text">Nullam dapibus ligula nec fringilla ultrices.Nullam dapibus ligula nec fringilla ultrices.
                            Nullam dapibus ligula nec fringilla ultrices.
                            Nullam dapibus ligula nec fringilla ultrices.
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="..\..\public\image\logo\Screenshot__130_-removebg-previewlogo.png" alt="Logo" class="footer-logo" width="150px" height="80px">
                        <label style="color:white;font-size:50px;font-weight:bold;">Encora</label>


                    </div>
                </div>
            </div>
        </div>
    </footer>








    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>