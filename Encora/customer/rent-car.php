<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}

if (!isset($_SESSION["CUSTOMER"])) {
  header("Location: login/index.php");
  exit;
}


#CUSTOMER MODEL CLASS
require_once "customerModel.php";

if (isset($_POST["rent-car"]) && $_POST["rent-car"] == "true") {

  $customerModel = new CustomerModel();
  $customer_id;
  date_default_timezone_set('Asia/Colombo');
  $created_at = date("Y-m-d H:i:s");
  if (isset($_SESSION["CUSTOMER"])) {
    $customer_id = $_SESSION["CUSTOMER"]["id"];
  }

  if ($_POST["pickup_date"] == "") {
  } else if ($_POST["drop_off_date"] == "") {
  } else if ($_POST["vehicle_id"] == "") {
  } else if ($customer_id == "") {
  } else if ($created_at == "") {
  } else if ($_POST["current_location"] == "") {
  } else {
    $vehicle_id = $_POST["vehicle_id"];
    $bookingRs = $customerModel->addBooking($_POST, $customer_id, $created_at, $vehicle_id);
    header("Location: bookings.php");
    exit;
  }
}

$rstatus = false;

if (isset($_POST["rent-car"]) ) {
  $rstatus = true;
  $vid=$_POST["vehicle_id"];
  header("Location: rent-car.php?vehicle_id=" .$vid. "");
  exit;
}
if ($rstatus == false) {
  if (!isset($_GET["vehicle_id"]) || $_GET["vehicle_id"] == "") {
      header("Location: cars.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>ancora</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>

<?php require_once "header.php";?>

  <div class="container mt-5">
    <div class="row">

      <div class="col-md-6 mb-5">
        <div class="form-box">
          <!-- Login Form -->
          <div class="col-12 text-center">
            <label style="font-size: 40px;font-weight:600;" for="">Book Car Now</label>
          </div>
          <form action="rent-car.php" method="POST">
            <div class="form-group mt-3">
              <label for="firstName">Pick up date</label><br>
              <input name="pickup_date" class="form-control" type="date">
            </div>
            <div class="form-group">
              <label for="address">Dropoff date</label>
              <br>
              <input name="drop_off_date" class="form-control" type="date">
            </div>
            <div class="form-group">
              <label for="lastName">Current Location</label>
              <input name="current_location" type="text" class="form-control" id="registerPassword">
            </div>
            <div class="form-group">
              <label for="address">Additional Information</label>
              <br>
              <input style="height: 150px;" type="text" name="ai" class="form-control"></textarea>
              <input name="vehicle_id" class="d-none" value="<?php if (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "") {
                                                                echo $_GET["vehicle_id"];
                                                              } ?>" type="text">
            </div>

            <button type="submit" class="btn btn-warning">Reset</button>
            <button name="rent-car" value="true" type="submit" class="btn btn-warning">Submit</button>
          </form>
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-box">
          <!-- Register Form -->
          <h2>Condition</h2>
          <p> Reservations:
            All reservations are subject to availability.
            Customers must provide accurate personal information and contact details when making a reservation.
            Reservations may be canceled or modified based on the company's policies.

            Driver's License and Age:
            Renters must present a valid driver's license at the time of rental.
            Minimum and maximum age restrictions may apply, and additional fees may be charged for drivers under a certain age.

            Rental Period:
            The rental period begins and ends at the agreed-upon dates and times specified in the reservation.
            Late returns may be subject to addi.</p>

        </div>
      </div>
    </div>
  </div>
  <?php require_once "footer.php";?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>