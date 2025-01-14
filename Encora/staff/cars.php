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

require_once "staffModel.php";

$adminModel = new StaffModel();

$carRs = $adminModel->getCars();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | Cars</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/customer.css">
</head>

<body>
<?php require_once "../public/includes/header.php" ?>
  <!-- Add more car cards here -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="row mx-5 mt-5  p-3">
          <?php
          if ($carRs->num_rows > 0) {
            $rows = mysqli_fetch_all($carRs, MYSQLI_ASSOC);
            foreach ($rows as $row) {
          ?>
              <div class="col-12 border border-1 mb-2 mt-2">
                <div class="row">
                  <div class="col-12 col-md-4 col-lg-4 p-2">
                    <img width="100%" src="..\<?php echo $row["image_path"] ?>" alt="">
                  </div>
                  <div class="col-12 col-md-8 col-lg-6  p-2 mb-1">
                    <div class="col-12 col-lg-8 mt-lg-5">
                      <span style="font-size: 22px;  font-weight: 700px;"><?php echo $row["v_name"] ?></span>
                    </div>
                    <div class="col-12 col-lg-8 mt-2 d-flex justify-content-between">
                      <label style="align-self:flex-end;" for="">Brand</label><small><?php echo $row["name"] ?></small>
                    </div>
                    <div class="col-12 col-lg-8  d-flex justify-content-between mt-2">
                      <label style="align-self:flex-end;" for="">Passenger Count</label><label for=""><?php echo $row["passanger_count"] ?></label>
                    </div>
                    <div class="col-12 col-lg-8 d-flex justify-content-between mt-2">
                      <label style="align-self:flex-end;" for="">Fee for One Day</label><label for="">LKR <?php echo $row["price_for_24_hour"] ?></label>
                    </div>
                    <div class="col-12 col-lg-8 d-flex justify-content-between mt-2">
                      <p style="color: gray;"><?php echo $row["description"] ?></p>
                    </div>
                  </div>
                  <div class="col-12 col-lg-2 d-flex justify-content-center align-content-center">
                    <div style="height: 100%; align-items: center;display: flex;"> <a class="text-white text-decoration-none btn btn-warning" href="view-car.php?vehicle_id=<?php echo $row['id'] ?>">View more Details</a></div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 col-lg-8">
                    <p style="color: gray;">

                    </p>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            #NO CARS IN SYSTEM
          }
          ?>

        </div>
      </div>
    </div>
  </div>

  <?php require_once "../public/includes/footer.php" ?>





</body>

</html>