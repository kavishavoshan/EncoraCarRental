<!DOCTYPE html>
<html>

<head>
    <title>Encora|contactus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_lifetime', 86400);
        session_start();
    }

    require_once "header.php" ?>
    <div class="container-fluid">
        <div class="text-center">
            <h1><b>Contact us</b></h>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="contact-box m-4">
                    <h2><b>Contact Us</b></h2>
                    <p>Feel free to reach out to us with any inquiries or feedback.
                        Feel free to reach out to us with any inquiries or feedback.
                        Feel free to reach out to us with any inquiries or feedback.
                        Feel free to reach out to us with any inquiries or feedback.
                        Feel free to reach out to us with any inquiries or feedback.
                        Feel free to reach out to us with any inquiries or feedback.

                    </p>
                    <h5><b>Encoro Car Rental</b></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus auctor sapien sit amet orci tincidunt,
                        ut facilisis justo ullamcorper. Sed blandit lobortis dui sed vulputate.Lorem ipsum dolor sit amet, consectetur adipiscin
                        g elit. Phasellus auctor sapien sit amet orci tincidunt, ut facilisis justo ullamcorper. S
                        ed blandit lobortis dui sed vulputate.

                    </p>
                    <p>Contact Number: <strong>+1 123-456-7890</strong></p>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-box m-4">
                    <h2><b>Opening Hours</b></h2>
                    <div>
                        <p>8 am to 10 pm</p>
                    </div>
                </div>


                <div class="form-box m-4">

                    <h2><b>Email Contact Form</b></h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter the subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php" ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>