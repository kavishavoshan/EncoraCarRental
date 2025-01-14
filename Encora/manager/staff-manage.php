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
if (isset($_POST["block_staff"]) && $_POST["block_staff"] != "") {
    $blockManagerRs = $manageModel->blockStaff($_POST["block_staff"]);
    unset($_POST);
}
if (isset($_POST["unblock_staff"]) && $_POST["unblock_staff"] != "") {
    $blockManagerrRs = $manageModel->unBlockStaff($_POST["unblock_staff"]);
    unset($_POST);
}
if (isset($_POST["delete_ustaff"]) && $_POST["delete_ustaff"] != "") {
    $blockManagerRs = $manageModel->deleteStaff($_POST["delete_ustaff"]);
    unset($_POST);
}

$satffRs = $manageModel->getStaff();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encora | staff manage </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>

    <body>
    <?php require_once "../public/includes/header.php" ?>
        <div class="text-center">
            <b>
                <h3>Staff Manage</h3>
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
                            <table class="table ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($satffRs->num_rows > 0) {
                                        $rows = mysqli_fetch_all($satffRs, MYSQLI_ASSOC);
                                        foreach ($rows as $row) {
                                    ?>
                                            <form action="" method="POST">
                                                <tr>
                                                    <th scope="row"><?php echo $row["id"] ?></th>
                                                    <td><?php echo $row["name"] ?></td>
                                                    <td><?php echo $row["email"] ?></td>
                                                    <?php
                                                    if ($row["status"] == 1) {
                                                    ?>
                                                        <td><button value="<?php echo $row["id"] ?>" name="unblock_staff" class="btn btn-success text-white">Unblock account</button> </td>
                                                    <?php
                                                    } else if ($row["status"] == 0) {
                                                    ?>
                                                        <td> <button value="<?php echo $row["id"] ?>" name="block_staff" class="btn btn-warning text-white">Block account</button> </td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td><button value="<?php echo $row["id"] ?>" name="delete_ustaff" class="btn btn-danger text-white">Delete</button></td>
                                                </tr>
                                            </form>
                                    <?php
                                        }
                                    } else {
                                        #NO STAFF
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