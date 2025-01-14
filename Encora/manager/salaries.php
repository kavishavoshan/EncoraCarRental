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

if (isset($_POST["add_sallery"]) && $_POST["add_sallery"] != "") {
    $addSalleryRs = $manageModel->addSllery($_POST);
    unset($_POST);
}


$salleryRs = $manageModel->getSllery();

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

        <div class="text-center">
            <b>
                <h3>Employee Salary Manage</h3>
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
                                        <th scope="col">Employee id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">amount of salary </th>
                                        <th scope="col">Add</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($salleryRs->num_rows > 0) {
                                        $rows = mysqli_fetch_all($salleryRs, MYSQLI_ASSOC);
                                        foreach ($rows as $row) {
                                    ?>
                                            <form action="" method="POST">
                                                <tr>
                                                    <th scope="row"><?php echo $row["id"] ?></th>
                                                    <td><?php echo $row["name"] ?></td>
                                                    <td><?php echo $row["email"] ?></td>
                                                    <td><input required name="month" class="form-control" type="month"></td>
                                                    <td><input required name="amount" class="form-control" type="text"></td>
                                                    <td><button name="add_sallery" value="<?php echo $row["id"] ?>" class="btn btn-warning">Add</button></td>
                                                </tr>
                                            </form>
                                    <?php

                                        }
                                    } else {

                                        #NO SALLERY
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