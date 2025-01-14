<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400);
    session_start();
}

#CHECK TRIP ADVISOR SESSION
if (isset($_SESSION["TRIP-ADVISOR"])) {
} else {
    header("Location: login/index.php");
    exit;
}

require_once "trip-advisorModel.php";

$tripAdvisorModel = new TripAdvisorModel();



if (isset($_POST["hand_over_vehicle"]) && $_POST["hand_over_vehicle"] != "") {
    $assignTripAdvriorRs = $tripAdvisorModel->handOver($_POST["hand_over_vehicle"]);
    unset($_POST);
}

if (isset($_POST["status"]) && $_POST["status"] != "") {
    $updateStatusRs = $tripAdvisorModel->addVehicleStatus($_POST,$_SESSION["TRIP-ADVISOR"]["id"]);
    unset($_POST);
}


$clientRs = $tripAdvisorModel->getStartClients($_SESSION["TRIP-ADVISOR"]["id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encora | vahicle status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/customer.css">
</head>

<body>
<?php require_once "../public/includes/header.php" ?>


<div class="text-center">
    <b>
      <h3>Update Trip Vehicle Status</h3>
    </b>
  </div>



  
    <!-- Add more car cards here -->
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
                        <table class="table " style="over-flow:scroll">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Vehicle</th>
                                    <th scope="col">Pickup Date</th>
                                    <th scope="col">Dropoff Date</th>
                                    <th scope="col">Location</th>
                                    <th>Status</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($clientRs->num_rows > 0) {
                                    $rows = mysqli_fetch_all($clientRs, MYSQLI_ASSOC);
                                    foreach ($rows as $row) {
                                ?>
                                        <form action="" method="POST">
                                            <tr>
                                                <th scope="row"><?php echo $row["id"] ?></th>
                                                <td><?php echo $row["name"] ?></td>
                                                <td><?php echo $row["email"] ?></td>
                                                <td><?php echo $row["pickup_date"] ?></td>
                                                <td><?php echo $row["drop_off_date"] ?></td>
                                                <td><?php echo $row["current_location"] ?></td>

                                                <td>
                                                    <textarea style="height: 150px;" name="stat" id="" cols="30" rows="10"></textarea>
                                                </td>
                                                <td>
                                                    <button name="status" value="<?php echo $row["id"] ?>" class="btn btn-warning col-12 text-white">Add</button>

                                                </td>

                                            </tr>
                                        </form>
                                <?php

                                    }
                                } else {
                                    #NO CUSTOMERS
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "../public/includes/footer.php" ?>

</body>

</html>