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


$paymentRs = $manageModel->getPayments();


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
  

    <body>

    <?php require_once "../public/includes/header.php" ?>

    
        <div class="col-12 mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="row px-5">
                        <div class="col-12">
                            <table class="table " style="over-flow:scroll">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Order number</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Payment Recipt number</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($paymentRs->num_rows > 0) {
                                        $rows = mysqli_fetch_all($paymentRs, MYSQLI_ASSOC);
                                        foreach ($rows as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row["bid"] ?></td>
                                                <td><?php echo $row["name"] ?></td>
                                                <td><?php echo $row["payment_recipt_id"] ?></td>
                                                <td><?php echo $row["value"] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        #NO PAYMENTS
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