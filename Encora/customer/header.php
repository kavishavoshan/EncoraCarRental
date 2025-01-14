<header class="container-fluid">
  <!-- First Row: Site Title -->
  <div class="row">
    <div class="col text-center header-top">
      <h7>Car Rental Application</h7>
    </div>
  </div>

  <!-- Second Row: Logo, Company Name, Login/Register Buttons, User Account Icon -->
  <div class="row align-items-center header-top-2">
    <div class="col-6">
      <img src="..\public\image\logo\Screenshot__130_-removebg-previewlogo.png" alt="Company Logo" class="logo" width="120" height="70">
      <label class="company-name">Encora</label>

    </div>
    <div class="col-6 text-right">
      <?php
      if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_lifetime', 86400);
        session_start();
      }

      if (isset($_POST["logout"]) && $_POST["logout"] == "true") {
        session_destroy();
        header("Location: index.php");
      }
      ?>
     
        <?php
        if (isset($_SESSION["CUSTOMER"])) {
          ?>
           <form action="header.php" method="POST">
          <?php
          echo "<lable>Welcome : " . $_SESSION["CUSTOMER"]["name"] . " </label>";
          echo "<button name='logout' value='true' class='btn btn-warning'>Logout</button>";
          echo "</form>";
        ?>

        <?php
        } else {
        ?>
          <button class="btn btn-warning"><a class="text-white text-decoration-none" href="login/index.php">Login</a></button>
          <button class="btn btn-secondary"><a class="text-white text-decoration-none" href="login/index.php">Register</a></button>
        <?php
        }
        ?>


      <img src="..\public\image\icon\user(7).png" alt="Company Logo" class="logo" width="20" height="20"><br>
      <img src="..\public\image\icon\facebook(1).png" alt="Company Logo" class="logo" width="20" height="20">
      <img src="..\public\image\icon\instagram(1).png" alt="Company Logo" class="logo" width="20" height="20">
      <img src="..\public\image\icon\twitter.png" alt="Company Logo" class="logo" width="20" height="20">
    </div>
  </div>



  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contactus.php">Contact</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="cars.php">Car</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="bookings.php">My Bookings</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="trip-advisor.php">Trip Advisor</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="aboutus.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="row header-top-4">
    <div class="col">
      <img src="..\public\image\icon\menu.png" alt="Company Logo" class="logo" width="25" height="25" style="margin-top:16px">
    </div>
    <div class="col text-center">
      <form class="form-inline" style="margin-top:12px">
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-warning mb-2">Search</button>
      </form>
    </div>
  </div>


</header>
