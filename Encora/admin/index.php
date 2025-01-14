<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400);
    session_start();
}

#CHECK TRIP ADVISOR SESSION
if (isset($_SESSION["ADMIN"])) {
} else {
    header("Location: login/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encora | Admin</title>
</head>
<!DOCTYPE html>
<html>

<head>
    <title>ancora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
    <?php require_once "../public/includes/header.php" ?>
    <div class="col-12 mt-2 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="row px-5">
                            <div class="col-3">
                                <a href="payment.php"> <img width="200px" src="../public/image/icon/pay1.png" alt=""></a>
                                <br>
                                <a class="col-12 mt-3 btn btn-warning text-white" style="  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" href="payment.php">Make and View Payments</a>
                            </div>
                            <div class="col-3">
                                <a href="customer.php"> <img width="200px" src="../public/image/icon/cus1.png" alt=""></a>
                                <br>
                                <a style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" class="col-12 mt-3 mx-2 btn btn-warning text-white" href="customer.php">Manage Customers</a>
                            </div>
                            <div class="col-3">
                                <a href="vahicle-type-add.php"> <img width="200px" src="../public/image/icon/add1.png" alt=""></a>
                                <br>
                                <a class="col-12 mt-3 btn btn-warning text-white" style="  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" href="vahicle-type-add.php">Add Vehicle type & Vahicle Brand</a>
                            </div>
                            <div class="col-3">
                                <a href="add-vahicle.php"> <img width="200px" src="../public/image/icon/add_car.png" alt=""></a>
                                <br>
                                <a class="col-7 mt-3 btn btn-warning text-white" style="  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" href="add-vahicle.php">Add Car</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "../public/includes/footer.php" ?>
</body>

</html>