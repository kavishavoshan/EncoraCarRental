<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400);
    session_start();
}

#CHECK TRIP ADVISOR SESSION
if (isset($_SESSION["MANAGER"])) {
} else {
    header("Location: login/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Encora | Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
<?php require_once "../public/includes/header.php" ?>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="row px-5">
                            <div class="col-3">
                                <a href="add-vahicle.php"> <img width="200px" src="../public/image/icon/pin.png" alt=""></a>
                                <br>
                                <a class="col-7 mt-3 btn btn-warning text-white" style="  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" href="trip-advisor-assigned.php">Assign Trip-Advisor</a>
                            </div>
                            <div class="col-3">
                                <a href="vehicle.php"> <img width="200px" src="../public/image/icon/doller.png" alt=""></a>
                                <br>
                                <a style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" class="col-7 mt-3 mx-2 btn btn-warning text-white" href="salaries.php">Manage Salary</a>
                            </div>
                            <div class="col-3">
                                <a href="vehicle.php"> <img width="200px" src="../public/image/icon/pay1.png" alt=""></a>
                                <br>
                                <a style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" class="col-7 mt-3 mx-2 btn btn-warning text-white" href="view-payment.php">Customer Payments</a>
                            </div>
                            <div class="col-3">
                                <a href="vehicle.php"> <img width="200px" src="..\public\image\icon\team.png" alt=""></a>
                                <br>
                                <a style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" class="col-7 mt-3 mx-2 btn btn-warning text-white" href="staff-manage.php">Staff Mannage</a>
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