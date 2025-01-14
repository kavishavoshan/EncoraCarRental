<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}



#CUSTOMER MODEL CLASS
require_once "customerModel.php";

$customerModel = new CustomerModel();

$tripAdvisorRs = $customerModel->getTripAdvisors();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | trip-advisor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/customer.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="row">


          <?php require_once "header.php" ?>
          <!-- Add more car cards here -->

          <div class="container text-center mt-4">
            <h1 style="color: #535353;" class="mb-5">All our Trip Advisors</h1>
            <div class="row">
              <?php
              if ($tripAdvisorRs->num_rows > 0) {
                $rows = mysqli_fetch_all($tripAdvisorRs, MYSQLI_ASSOC);
                foreach ($rows as $row) {
              ?>
                  <div class="col-md-4 text-center">
                    <div class="card">
                      <div class="col-12 mt-3">
                        <div class="row">
                          <div class="col-2 offset-5">
                            <div style="width: 40px;height: 40px;background-color: red;border-radius: 50%;"><label class="text-white" style="font-size: 23px;" for="">
                                <?php
                                echo $firstLetter = substr($row["name"], 0, 1);
                                ?>
                              </label></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body mb-3">
                        <h5 class="card-title" style="font-size: 30px;"><?php echo $row["name"] ?></h5>
                        <p class="card-text">Mobile : <?php echo $row["contact_number"] ?></p>
                        <p class="card-text">Email: <?php echo $row["email"] ?></p>
                      </div>
                    </div>






                  </div>
              <?php
                }
              } else {
                #NO TRIP ADVISORS IN SYSTEM
              }
              ?>
            </div>
          </div>

        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <?php require_once "footer.php" ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>