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

if (isset($_POST["pay"]) && $_POST["pay"] != "") {
  $payRs = $adminModel->makePayment($_POST);
}

$bookingRs = $adminModel->getBookings();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | Payment</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Car Rental Application</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>

  <body>

    <?php require_once "../public/includes/header.php" ?>

    <form class="form-inline  my-2 my-lg-0 justify-content-center">
      <input class="form-control mr-sm-2 mt-3" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-warning text-white mt-3" type="submit">Search</button>
    </form>

    </div>
    <div class="col-12 mt-3">
      <div class="row">
        <div class="col-12">
          <div class="row px-5">
            <div class="col-12">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Order number</th>
                    <th scope="col">pick up date</th>
                    <th scope="col">drop off date</th>
                    <th scope="col">location</th>
                    <th scope="col">payment recipt code</th>
                    <th scope="col">Amount</th>
                    <th scope="col">update payment</th>


                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($bookingRs->num_rows > 0) {
                    $rows = mysqli_fetch_all($bookingRs, MYSQLI_ASSOC);
                    foreach ($rows as $row) {
                      if ($row["trip_advisor_id"] != "") {


                  ?>
                        <form action="" method="POST">
                          <tr>
                            <th scope="row"><?php echo $row["id"] ?></th>
                            <td><?php echo $row["pickup_date"] ?></td>
                            <td><?php echo $row["drop_off_date"] ?></td>
                            <td><?php echo $row["current_location"] ?></td>
                            <td><input required name="r_id" value="<?php echo $row["payment_recipt_id"] ?>" <?php if ($row["payment_recipt_id"] != "") {
                                                                                                              echo "disabled";
                                                                                                            }   ?> type="text" class="form-control"></td>
                            <td><input required name="value" value="<?php echo $row["value"] ?>" <?php if ($row["value"] != "") {
                                                                                                    echo "disabled";
                                                                                                  }   ?> type="text" class="form-control"></td>
                            <td>
                              <?php
                              if ($row["value"] != "") {
                              ?>
                                <label class="btn btn-success text-white col-12">Payed</label>
                              <?php

                              } else {
                              ?>
                                <button name="pay" value="<?php echo $row["id"] ?>" class="btn btn-warning text-white col-12">confirm payment</button>
                              <?php
                              }
                              ?>

                            </td>
                          </tr>
                        </form>
                  <?php
                      }
                    }
                  } else {
                    #NO BOOKINGS
                  } ?>

                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require_once "../public/includes/footer.php" ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

  </html>