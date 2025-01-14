<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400);
    session_start();
}

#CHECK STAFF SESSION
if (isset($_SESSION["STAFF"])) {
} else {
    header("Location: login/index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Encora | Staff</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
<?php require_once "../public/includes/header.php" ?>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row px-5">
                          
                            <div class="col-3">
                                <a href="cars.php"> <img width="200px" src="../public/image/icon/car.png" alt=""></a>
                                <br>
                                <a style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" class="col-7 mt-3 mx-2 btn btn-warning text-white" href="cars.php">View Cars</a>
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