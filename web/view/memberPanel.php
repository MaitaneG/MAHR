<?php
error_reporting(0);
session_start();

$logged = $_SESSION["submitted"];
if ($_SESSION["member"]) {
    $member = $_SESSION["member"];
    $mail = $member[0]["mail"];
    $admin = $member[0]["admin"];
}else{
    echo "RESTRICTED AREA";
    die();
}
?>

<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles/styles.css"> 


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
              rel="stylesheet">

        <title>Erlete beekepers' association</title>
    </head>

    <body class="url">
        <!-- One way to present a title and content in a very prominent way on a page-->
        <div class="jumbotron bg-yellow mb-0">
            <h1>Erlete Beekepers' Association</h1>

        </div>

        <!--NAVIGATION BAR-->
        <div class="container-fluid sticky-top mt-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link p-3" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                        if ($member) {
                            echo '<li class="nav-item active">
                                        <a class="nav-link p-3 active disabled" href="#">Member Panel</a>
                                    </li>';
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link p-3" href="contact.php">Contact</a>
                        </li>
                    </ul>

                    <?php
                    if (!$member) {


                        echo '<form action="../controller/LoginValidation.php" class="form-inline" method="POST">

                            <input name="email" type="email" class="form-control mb-2 mr-sm-2" 
                                   size="30" required placeholder="Email">

                            <input name="password" type="password" class="form-control mb-2 mr-sm-2" placeholder="Password" required/>

                            <button type="submit" class="btn bg-yellow mb-2">Login</button>
                        </form>';
                    } else {
                        echo "<h6 id='currentMail' class='p-3'>$mail</h6>";
                        echo '<form action="../controller/logout.php">'
                        . '<input class="btn btn-danger" type="submit" value="Log Out"/>'
                        . '</form>';
                    }
                    ?>

                </div>
            </nav>
        </div>
        <!-- END OF THE NAVIGATION BAR -->

        <!-- CONTAINER-->
        <div class="container">

            <!-- ACCORDION-->
            <div id="accordion" class="mt-3">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1. Bookings
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">

                                        <!--DATEPICKER using JQuery to show a calendar-->
                                        <p>Date: <input type="text" id="datepicker" size="30"></p>


                                        </p><button id="button-reserve" class="btn bg-yellow ml-3" type="button">Reserve</button>



                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Table for the bookings-->
                                        <h3>Bookings</h3>
                                        <table  class="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Date</th>
                                                    <th colspan="2">Email</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-booking">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. Cans
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body p-3">
                            <h3>Production</h3> 
                            <div class="row p-3">

                                <input type="text" name="Production" placeholder="Production Kg"> 
                                <button class="btn bg-yellow ml-3" type="button" >Register</button>
                                <label></label>
                            </div>
                            <!--CARD to divide the cans-->
                            <div class="row justify-content-between">
                                <div class="col-12">
                                    <div class="card" style="width: 18rem;">
                                        <h5 class="card-title" align="center">Id can</h5>

                                        <div class="card-body">
                                            <img class="card-img-top" src="" alt="Card image cap">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <button class="btn bg-yellow">Use</button> 
                                            <button class="btn bg-yellow">Cancel</button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. Payments
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <!--Table to see the payments-->
                                <div class="col-12">
                                    <h3>View</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Concept</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>


                            <div class="row">
                                <!--Table to see the fees and to pay them-->
                                <div class="col-6">
                                    <h3>Fees</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th scope="col">ID_Fee</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Payed</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <button class="btn bg-yellow" type="button">Pay</button>

                                </div>

                                <!--Table to see the fees and to pay them-->
                                <div class="col-6">
                                    <h3>Tax</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th scope="col">Production</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <button class="btn bg-yellow" type="button">Pay</button>

                                </div>
                            </div>






                        </div>
                    </div>
                    <!--ACCORION END-->
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script src="../controller/app.js"></script>

                <!--The function to make uit work the datapicker-->
                <script>
                    $(function () {


                        $("#datepicker").datepicker();
                        $("#format").on("change",
                                function () {
                                    $("#datepicker").datepicker("option", "dateFormat", $(this).val());

                                });

                    });

                </script>
                </body>
                </html>