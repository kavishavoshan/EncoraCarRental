<?php
#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}

#CHECK STAFF SESSION
if (!isset($_SESSION["STAFF"])) {
  header("Location: login/index.php");
  exit;
}

require_once "staffModel.php";

$staffModel = new StaffModel();

if (isset($_POST["update_car"]) && $_POST["update_car"] != "") {
  $updateCarRs = $staffModel->updateCar($_POST);
  header("Location: view-car.php?vehicle_id=" . $_POST["v_id"] . "");
}

if (isset($_POST["delete_car"]) && $_POST["delete_car"] != "") {
  $deletCarRs =  $staffModel->deleteCar($_POST);
  header("Location: cars.php");
}

$rstatus = false;

if (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "") {
  $carRs = $staffModel->getCar($_GET["vehicle_id"]);
}


if ($rstatus == false) {
  if (!isset($_GET["vehicle_id"]) || $_GET["vehicle_id"] == "") {
    header("Location: cars.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | Add car </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>



  <body>

  <?php require_once "../public/includes/header.php" ?>




    <div class="container mt-5">
      <div class="row justify-content-center">
        <?php
        if ($carRs->num_rows > 0) {
          $rows = mysqli_fetch_all($carRs, MYSQLI_ASSOC);
          foreach ($rows as $row) {
        ?>
            <div class="col-lg-10">
              <div class="add-car-container text-center">
                <h3 class="text-center mb-4"><b>Car Details</b></h3>
                <img src="..\<?php echo $row["image_path"]; ?>" width="300px" height="200px">

                <form action="" method="POST">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="plate-number">Vahicle name</label>
                        <input disabled value="<?php echo $row["v_name"]; ?>" type="text" id="plate-number" name="vehcicle_name" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="plate-number">Plate Number:</label>
                        <input disabled value="<?php echo $row["plate_number"]; ?>" type="text" id="plate-number" name="plate_number" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="passenger-count">Passenger Count:</label>
                        <input disabled value="<?php echo $row["passanger_count"]; ?>" type="number" id="passenger-count" name="passenger_count" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" class="form-control" required><?php echo $row["description"]; ?></textarea>
                      </div>

                      <div class="form-group">
                        <label for="insurance-id">Insurance ID:</label>
                        <input value="<?php echo $row["insurance_number"]; ?>" type="text" id="insurance-id" name="insurance_id" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="insurance-id">Insurance start day:</label>
                        <input value="<?php echo $row["insurance_start_date"]; ?>" type="date" id="insurance-id" name="insurance_start_day" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="price">licence Number:</label>
                        <input value="<?php echo $row["license_number"]; ?>" type="text" id="price" name="licence_number" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label for="brand">licence start date:</label>
                        <input value="<?php echo $row["license_start_date"]; ?>" type="date" id="brand" name="licence_start_date" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label for="price">Fee for 24 Hours:</label>
                        <input value="<?php echo $row["price_for_24_hour"]; ?>" type="text" id="price" name="fee" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="brand">Vehicle Brand:</label>
                        <input disabled value="<?php echo $row["vbname"]; ?>" type="text" id="price" name="fee" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label for="type">Vehicle Type : </label>
                        <input disabled value="<?php echo $row["name"]; ?>" type="text" id="price" name="fee" class="form-control" required>
                        <input name="v_id" class="d-none" value="<?php echo $row["id"]; ?>" type="text">
                        </select>
                      </div>

                    </div>
                  </div>

                  <div class="text-center">
                    <button name="update_car" value="true" type="submit" class="btn btn-warning submit-btn"><b>Edit Car</b></button>
                    <form action="" method="POST">
                      <input name="v_id" class="d-none" value="<?php echo $row["id"]; ?>" type="text">
                      <button name="delete_car" value="true" type="submit" class="btn btn-danger submit-btn"><b>Delete Car</b></button>
                    </form>
                  </div>
              </div>
            </div>
      </div>
  <?php
          }
        } else {
          #ERROR
        }

  ?>

    </div>
    </div>
    <?php require_once "../public/includes/footer.php" ?>







    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

  </html>