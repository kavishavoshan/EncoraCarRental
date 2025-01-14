<!DOCTYPE html>
<html>

<head>
  <title>ancora</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
<?php require_once "header.php" ?> 
  <div class="title-text"><lable>User details</lable></div>
 
  <div class="container mt-6">
  <div class="row">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <img src="..\public\image\users\Untitled.jpg" class="card-img-top user-image" alt="User Image">
      </div>
    </div>
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">
          
          <p class="card-text"><strong>Full Name:</strong> John Doe</p>
          <p class="card-text"><strong>Mobile:</strong> 123-456-7890</p>
          <p class="card-text"><strong>Address:</strong> 123 Main St, City</p>
          <p class="card-text"><strong>Email:</strong> johndoe@example.com</p>
          <p class="card-text"><strong>Gender:</strong> Male</p>
          <p class="card-text"><strong>Birthday:</strong> January 1, 1990</p>
          <p class="card-text"><strong>Password:</strong> ********</p>
          <p class="card-text"><strong>Language:</strong> English</p>
          <button class="btn btn-warning">Change Details</button>
          <button class="btn btn-dark">Log Out</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "footer.php" ?> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</body>

</html>