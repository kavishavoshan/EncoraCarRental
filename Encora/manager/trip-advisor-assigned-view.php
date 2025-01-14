<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encora | Trip Advisor Assigned View </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\css\customer.css">
</head>

<body>
  
    <body>

    <?php require_once "../public/includes/header.php" ?>

        <div class="text-center">
   <b>
    <h3>Trip Advisor Assigned View</h3></b>

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
                            <table class="table " style="over-flow:scroll">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Order number</th>
                                        <th scope="col">pick up date</th>
                                        <th scope="col">drop off date</th>
                                        <th scope="col">Vahicle image</th>
                                        <th scope="col">Vahicle Name</th>
                                        <th scope="col">Trip Advisor</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <form>
                                        <tr>
                                            <th scope="row">1</th>

                                            <td>2023.05.05</td>
                                            <td>2023.06.05</td>
                                          <td><img src="..\public\image\vehicle_images\toyota_rush.jpg" width="100"></td>
                                            <td>Rush</td>
                                             <td>mr.pasidu</td>
                                            
                                        </tr>
                                    </form>


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php require_once "../public/includes/footer.php" ?>






       
        </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>