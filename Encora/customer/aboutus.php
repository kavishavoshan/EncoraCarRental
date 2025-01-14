<?php

#START SESSION
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_lifetime', 86400);
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>ancora</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
  <?php require_once "header.php"; ?>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-4">
        <img src="..\public\image\mission and goals\Business_team_2.jpg" alt="Image 1" class="img-fluid">
      </div>
      <div class="col-md-4 centered-paragraph">
        <h3>Our Mission and Goals</h3>
        <p>Welcome to CarRNet, your premier destination for all
          things automotive! Our mission is to revolutionize
          the car industry by providing a seamless and user-friend
          ly web application that connects car enthusiasts, buyers,
          and sellers in a dynamic online marketplace. We aim to empowe
          r our users with comprehensive tools and information to make informed
          decisions when it comes to buying or selling t
        </p>
      </div>
      <div class="col-md-4 text-center">
        <img src="..\public\image\mission and goals\images.png" alt="Image 2" class="img-fluid">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6">
        <img src="..\public\image\mission and goals\feeling-confused-about-business-decision-right-left-yes-no-ethical-dilemma-choosing-choice-undecided-concept-illustration_270158-615.avif" alt="Image 3" class="img-fluid" width="300px" height="300px">
      </div>
      <div class="col-md-6 centered-small-paragraph">
        <h3>why choose encora car rentals?</h3>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus auctor sapien sit amet orci tincidunt, ut facilisis justo ullamcorper.</p>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-12 centered-topic">
        <h3>Customer Feedback</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="comment-box">
          <p>Customer Comment 1</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="comment-box">
          <p>Customer Comment 2</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="comment-box">
          <p>Customer Comment 3</p>
        </div>
      </div>
    </div>
  </div>
  <?php require_once "footer.php"; ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>