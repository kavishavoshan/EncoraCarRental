<?php
#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encora | Register ( Staff & Trip-Advisors ) </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
  <?php require_once "header.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Registration Form for Trip Advisor or Staff Member</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <h3>Eligibility for Trip Advisor</h3>
          <ul>
            <li>Age must be above 18</li>
            <li>Must have passed A/L</li>
            <li>12 months work experiance</li>
            <li>Must have NVQ level 3 ICT qualification</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box">
          <h3>Registration Form</h3>
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="name">age</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="name">email</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="name">mobile</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="name">create password</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="name">confirm password</label>
              <input type="text" class="form-control" id="name">
            </div>
            <!-- Rest of the form fields -->
            <button type="submit" class="btn btn-warning">Next</button>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box">
          <h3>Eligibility for Staff Member</h3>
          <ul>
            <li>Age must be above 18</li>
            <li>Must have passed O/l</li>
            <li>6 months work experiance</li>
            <li>Should have proficiency in automotive technology</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Join With Us and Success Your Future</h2>
      </div>
    </div>
  </div>











  <?php require_once "footer.php" ?>







  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>