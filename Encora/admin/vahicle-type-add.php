<?php
#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}

#CHECK TRIP ADVISOR SESSION
if (!isset($_SESSION["ADMIN"])) {
  header("Location: login/index.php");
  exit;
}

require_once "adminModel.php";

$adminModel = new AdminModel();

if (isset($_POST["add_vehicle_type"]) && $_POST["add_vehicle_type"] == "true") {
  $adminModel->addVehicleType($_POST);
  unset($_POST);
}

if (isset($_POST["add_vehicle_brand"]) && $_POST["add_vehicle_brand"] == "true") {
  $adminModel->addVehicleBrand($_POST);
  unset($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | vahicle type and brnad add</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/customer.css">
</head>

<body>
<?php require_once "../public/includes/header.php" ?>
  <!-- Add more car cards here -->



  <div class="text-center">
    <b>
      <h3>Add brand and  Add Vehicle type</h3>
    </b>
  </div>

  <div class="container">
    <div class="row">



      <div class="col text-center">
        <div class="mt-4"><b>
            <h3>Add Vehicle Type</h3>
          </b></div>
        <img src="..\public\image\vector\xlqk778o.bmp" width="250px" class="mt-4">
        <i class="fas fa-car icon"></i>
        <form action="" method="POST">
          <input required name="type" type="text" placeholder="Add Vehicle Type" class="mt-4 form-control">
          <button type="submit" name="add_vehicle_type" value="true" class="btn btn-warning mt-3">Add Type</button>
        </form>

      </div>





      <div class="col text-center">
        <div class="mt-4"><b>
            <div class="mt-4"><b>
                <h3>Add Vehicle Brand</h3>
              </b></div>
            <img src="..\public\image\vector\car-logo-vectors.jpg" width="350px" class="mt-4">
            <i class="fas fa-car icon"></i>
            <form action="" method="POST">
              <input required name="brand" placeholder="Add Vehicle Brand" class="mt-4 form-control">
              <button value="true" type="submit" name="add_vehicle_brand" class="btn btn-warning mt-3">Add Brand</button>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php require_once "../public/includes/footer.php" ?>
    

</body>

</html>