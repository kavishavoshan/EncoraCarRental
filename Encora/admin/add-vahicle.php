<?php
#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}

#CHECK STAFF SESSION
if (!isset($_SESSION["ADMIN"])) {
  header("Location: login/index.php");
  exit;
}
require_once "adminModel.php";

$adminModel = new AdminModel();

$vehcileBrandRs = $adminModel->getVehicleBrands();
$vehcileTypeRs = $adminModel->getVehicleTypes();


if (isset($_POST["add_vehicle"]) && $_POST["add_vehicle"] == "true") {
  $file_name;
  if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpPath = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];

    // Set the upload directory (adjust the path as needed)
    $uploadDirectory = '../public/image/vehicle_images/';

    // Generate a unique filename to prevent collisions
    $uid = uniqid();
    $newFileName =  $uid . '_' . $fileName;

    // Check if the file is an image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (in_array($fileType, $allowedTypes)) {
      // Move the uploaded file to the desired location
      $destination = $uploadDirectory . $newFileName;
      if (move_uploaded_file($fileTmpPath, $destination)) {
        echo 'File uploaded successfully!';
        $db_file_name = "public/image/vehicle_images/" . $uid . "_" . $fileName;
        $adminModel->addvehicle($_POST, $db_file_name);
        header("Location: cars.php");
      } else {
        echo 'Failed to move the uploaded file.';
      }
    } else {
      echo 'Invalid file type. Only JPEG and PNG images are allowed.';
    }
  } else {
    echo 'Error uploading file. Please try again.';
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
      <div class="col-lg-10">
        <div class="add-car-container text-center">
          <h3 class="text-center mb-4"><b>Add Car</b></h3>
          <img src="..\public\image\vehicle_images\toyota1.jpg" width="300px" height="200px">

          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="plate-number">Vahicle name</label>
                  <input type="text" id="plate-number" name="vehcicle_name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="plate-number">Plate Number:</label>
                  <input type="text" id="plate-number" name="plate_number" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="passenger-count">Passenger Count:</label>
                  <input type="number" id="passenger-count" name="passenger_count" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                  <label for="insurance-id">Insurance ID:</label>
                  <input type="text" id="insurance-id" name="insurance_id" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="insurance-id">Insurance start day:</label>
                  <input type="date" id="insurance-id" name="insurance_start_day" class="form-control" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="price">licence Number:</label>
                  <input type="text" id="price" name="licence_number" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="brand">licence start date:</label>
                  <input type="date" id="brand" name="licence_start_date" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="price">Price for 24 Hours:</label>
                  <input type="text" id="price" name="fee" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="brand">Vehicle Brand:</label>
                  <select name="vehicle_brand_id" id="brand" class="form-control" required>
                    <option value="0">Select</option>
                    <?php
                    if ($vehcileBrandRs->num_rows > 0) {
                      $rows = mysqli_fetch_all($vehcileBrandRs, MYSQLI_ASSOC);
                      foreach ($rows as $row) {
                    ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                    <?php
                      }
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="type">Vehicle Type : </label>
                  <select name="vehicle_type_id" id="type" class="form-control" required>
                    <option value="0">Select</option>
                    <?php
                    if ($vehcileTypeRs->num_rows > 0) {
                      $rows = mysqli_fetch_all($vehcileTypeRs, MYSQLI_ASSOC);
                      foreach ($rows as $row) {
                    ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                    <?php
                      }
                    }

                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" name="image" accept="image/*" required class="form-control-file">
                </div>
              </div>
            </div>

            <div class="text-center">
              <button name="add_vehicle" value="true" type="submit" class="btn btn-warning submit-btn"><b>Add Car</b></button>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php require_once "../public/includes/footer.php" ?>







  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>