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

require_once "managerModel.php";

$manageModel = new ManagerModel();


$bookings = $manageModel->getBookings();


if (isset($_POST["assign"]) && $_POST["assign"] != "") {
    $assignTripAdvriorRs = $manageModel->assignTripAdvisor($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encora | Trip Advisor Assinged </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>

    <body>

    <?php require_once "../public/includes/header.php" ?>

        <div class="text-center">
            <b>
                <h3>Trip Advisor Assigned</h3>
            </b>
        </div>


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
                                        <th scope="col">Order number</th>
                                        <th scope="col">pick up date</th>
                                        <th scope="col">drop off date</th>
                                        <th scope="col">Vahicle image</th>
                                        <th scope="col">Vahicle Name</th>
                                        <th scope="col">Trip Advisor</th>
                                        <th scope="col">Assigned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($bookings->num_rows > 0) {
                                        $rows = mysqli_fetch_all($bookings, MYSQLI_ASSOC);
                                        foreach ($rows as $row) {



                                    ?>
                                            <form action="" method="POST">
                                                <tr>
                                                    <th scope="row"><?php echo $row["id"]; ?></th>
                                                    <td><?php echo $row["pickup_date"]; ?></td>
                                                    <td><?php echo $row["drop_off_date"]; ?></td>
                                                    <td><img src="..\<?php echo $row["image_path"]; ?>" width="100"></td>
                                                    <td><?php echo $row["v_name"]; ?></td>
                                                    <?php
                                                    if ($row["trip_advisor_id"] == "") {
                                                    ?>
                                                        <td> <select name="tid" required class="select2" style="width:100%;background-color:white;height:40px;border-radius:5px">
                                                                <option value="0">Select</option>
                                                                <?php
                                                                $tripAdvisorRs = $manageModel->getTripAdvisor();
                                                                if ($tripAdvisorRs->num_rows > 0) {
                                                                    $rows2 = mysqli_fetch_all($tripAdvisorRs, MYSQLI_ASSOC);
                                                                    foreach ($rows2 as $row2) {
                                                                ?>
                                                                        <option value="<?php echo $row2["id"] ?>"><?php echo $row2["name"] ?></option>
                                                                <?php
                                                                    }
                                                                } else {
                                                                    #NO TRIP-ADVISORS
                                                                }
                                                                ?>

                                                            </select>
                                                        <?php   } else {
                                                        ?>
                                                        <td> <label for="" class="btn btn-success">Assigned</label></td>
                                                    <?php
                                                    } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row["trip_advisor_id"] == "") {
                                                        ?>
                                                            <button name="assign" value="<?php echo $row["id"] ?>" class="btn btn-warning text-white">Assign</button>
                                                    </td>
                                                <?php
                                                        }else{
                                                            ?>
                                                            <label for="" class="btn btn-primary text-white">Assigned</label>
                                                            <?php
                                                        }
                                                ?>

                                                <td></td>
                                                </tr>
                                            </form>
                                    <?php
                                        }
                                    } else {
                                        #NO BOOKINGS
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

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>