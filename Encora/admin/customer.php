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

if (isset($_POST["block_customer"]) && $_POST["block_customer"] != "") {
  $blockCustomerRs = $adminModel->blockCustomer($_POST["block_customer"]);
  unset($_POST);
}
if (isset($_POST["unblock_customer"]) && $_POST["unblock_customer"] != "") {
  $blockCustomerRs = $adminModel->unBlockCustomer($_POST["unblock_customer"]);
  unset($_POST);
}
if (isset($_POST["delete_user"]) && $_POST["delete_user"] != "") {
  $blockCustomerRs = $adminModel->deleteCustomer($_POST["delete_user"]);
  unset($_POST);
}

$customerRs = $adminModel->getCustomers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | Custormer </title>
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
    <div class="text-center">
      <b>
        <h3>Custormers</h3>
      </b>
    </div>


    <form class="form-inline  my-2 my-lg-0 justify-content-center">
      <input class="form-control mr-sm-2 mt-3" type="search" placeholder="Custormer Email" aria-label="Search">
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
                    <th scope="col">Custormer id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Nic</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Change status</th>
                    <th scope="col">Delete account</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($customerRs->num_rows > 0) {
                    $rows = mysqli_fetch_all($customerRs, MYSQLI_ASSOC);
                    foreach ($rows as $row) {
                  ?>
                      <form action="" method="POST">
                        <tr>
                          <th scope="row"><?php echo $row["id"] ?></th>
                          <td><?php echo $row["name"] ?></td>
                          <td><?php echo $row["email"] ?></td>
                          <td><?php echo $row["address"] ?></td>
                          <td><?php echo $row["nic_number"] ?></td>
                          <td><?php echo $row["contact_number"] ?></td>
                          <td>
                            <?php
                            if ($row["status"] == 1) {
                            ?>
                              <button value="<?php echo $row["id"] ?>" name="unblock_customer" class="btn btn-success text-white">Unblock account</button>
                            <?php
                            } else if ($row["status"] == 0) {
                            ?>
                              <button value="<?php echo $row["id"] ?>" name="block_customer" class="btn btn-warning text-white">block account</button>
                            <?php
                            }
                            ?>

                          </td>
                          <td><button value="<?php echo $row["id"] ?>" name="delete_user" class="btn btn-danger text-white">delete account</button></td>

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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

  </html>