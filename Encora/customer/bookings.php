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

$customerModel = new CustomerModel();

#UPDATE BOOK
if (isset($_POST["update_book"]) && $_POST["update_book"] != "") {

  if ($_POST["pd"] == "") {
  } else if ($_POST["dd"] == "") {
  } else if ($_POST["cl"] == "") {
  } else {
    $bookUpdateRs = $customerModel->updateBook($_SESSION["CUSTOMER"]["id"], $_POST["update_book"], $_POST["pd"], $_POST["dd"], $_POST["cl"]);
  }
}

if (isset($_POST["delete_book"]) && $_POST["delete_book"] != "") {
  $bookDeleteRs = $customerModel->deleteBook($_SESSION["CUSTOMER"]["id"], $_POST["delete_book"]);
}

if (isset($_POST["update_book"]) && $_POST["update_book"] != "") {
  unset($_POST);;
}
if (isset($_POST["delete_book"]) && $_POST["delete_book"] != "") {
  unset($_POST);
}


$customerBookingRs = $customerModel->getMyBooking($_SESSION["CUSTOMER"]["id"]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | Booking</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/customer.css">
</head>

<body>
  <?php require_once "header.php"; ?>
  <!-- Add more car cards here -->
  <div class="col-12 text-center mt-3">
    <h1 style="color: #535353;" class="mb-5">My Car Bookings</h1>
  </div>
  <div class="col-12">
    <div class="row">
      <div class="col-12">

        <?php
        if ($customerBookingRs->num_rows > 0) {
          $rows = mysqli_fetch_all($customerBookingRs, MYSQLI_ASSOC);
          foreach ($rows as $row) {
        ?>
            <form action="" method="POST">
              <div class="row px-5">
                <div class="col-12 border border-1 mb-2 ">
                  <div class="row">
                    <div class="col-12 mt-3">
                      <span class="mx-3" style="font-size: 22px;  font-weight: 700px;"><?php echo $row["v_name"]; ?></span>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 p-2">
                      <img width="100%" src="../<?php echo $row["image_path"]; ?>" alt="">
                    </div>
                    <div class="col-12 col-md-8 col-lg-5  p-2 mb-1">
                      <div class="col-12 col-md-8 col-lg-12  p-2 mb-1">
                        <label for="pl">Pickup Date</label>
                        <input name="pd" value="<?php echo $row["pickup_date"]; ?>" id="pl" type="date" class="form-control">
                      </div>
                      <div class="col-12 col-md-8 col-lg-12  p-2 mb-1">
                        <label for="dl">Dropoff Date</label>
                        <input name="dd" value="<?php echo $row["drop_off_date"]; ?>" id="dl" type="date" class="form-control">
                      </div>
                      <div class="col-12 col-md-8 col-lg-12  p-2 mb-1">
                        <label for="cl">Current Location</label>
                        <input name="cl" value="<?php echo $row["current_location"]; ?>" id="cl" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-12 col-lg-3 d-flex justify-content-center align-content-center">
                      <div class="row">
                        <div class="col-12 d-flex align-items-end mb-3">
                          <button name="update_book" value="<?php echo $row["id"]; ?>" class="btn btn-warning text-white col-12">Update Booking</button>
                        </div>
                        <div class="col-12 ">
                          <button name="delete_book" value="<?php echo $row["id"]; ?>" class="btn btn-danger col-12">Delete Booking</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>
      </form>
  <?php
          }
        } else {
          #NO BOOKINGS
        }
  ?>

    </div>
  </div>
  </div>


 <?php require_once "footer.php"; ?>







</body>

</html>