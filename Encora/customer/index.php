<?php
#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}


#CHECK TRIP ADVISOR SESSION
// if (!isset($_SESSION["CUSTOMER"])) {
//     header("Location: login/index.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Encora</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
<?php require_once "header.php" ?>
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="..\public\image\vehicle_images\polotno(1).png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..\public\image\vehicle_images\polotno(4).png" class="d-block w-100" alt="...">
      </div>
      
    </div>
  </div>



  <div class="text-center mt-3 mb-3">
    <a style="height: 60px;width: 300px;font-size: 25px;" class="btn btn-warning text-white" href="cars.php">Explore & Book</a>
  </div>
<?php require_once "footer.php" ; ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="..\public\js\bootstrap.bundle.js"></script>

</body>

</html>