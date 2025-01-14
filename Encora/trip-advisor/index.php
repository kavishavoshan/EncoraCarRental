<!-- <?php

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


      ?> -->

<!DOCTYPE html>
<html>

<head>
  <title>ancora</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>

<?php require_once "../public/includes/header.php" ?>

  <div class="col-12 mb-3">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="row px-5">
              <div class="col-3">
                <a href="vahicle-status.php"> <img width="200px" src="../public/image/icon/crash.png" alt=""></a>
                <br>
                <a class="col-7 mt-3 btn btn-warning text-white" style="  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" href="vahicle-status.php">Update Vehicle Status</a>
              </div>
              <div class="col-3">
                <a href="client.php"> <img width="200px" src="../public/image/icon/vc.png" alt=""></a>
                <br>
                <a style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);" class="col-7 mt-3 mx-2 btn btn-warning text-white" href="client.php">Vehicle Hand Over</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>



  <?php require_once "../public/includes/footer.php" ?>












  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>