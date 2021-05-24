<?php
error_reporting(0);
session_start();

$logged = $_SESSION["submitted"];
if ($_SESSION["member"]) {
    $member = $_SESSION["member"];
    $mail = $member[0]["mail"];
    $admin = $member[0]["admin"];
    $active = $member[0]["active"];
}
if ($active == 0) {
    echo "RESTRICTED AREA";
    die();
} if (!$_SESSION["member"]) {
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
        <meta http-equiv="refresh" content="900;url=../controller/Logout.php"/>		
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
              rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">

        <!--Link icono pestaña -->
        <link rel="shortcut icon" href="images/Iconopestaña.png" /> 

        <title>Erlete beekepers' association</title>
    </head>

    <body class="url">
        <!-- One way to present a title and content in a very prominent way on a page-->
        <div class="jumbotron bg-yellow mb-0">
            <h1>Erlete Beekepers' Association</h1>

        </div>

        <!--NAVIGATION BAR-->
        <div class="container-fluid sticky-top mt-0 mx-0  bg-light">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link px-4" href="index.php"><span "center" class="material-icons-outlined">
                                    home
                                </span>Home</span><span class="sr-only">(current)</span></a>
                        </li>

                        <!--The php code, if you are loged it will apear the member panel and member profile, but if you are not loged, you won't be able to see it.-->
                        <?php
                        if ($member) {
                            echo '<li class="nav-item">
								<a class="nav-link px-4" href="profile.php"><span class="material-icons-outlined">
                                                                   person
                                                                   </span>Profile</a>
								</li>';
                            echo '<li class="nav-item active">
								<a class="nav-link px-4 active disabled" href="#"><span class="material-icons-outlined">
                                                                   engineering
                                                                   </span>Member Panel</a>
								</li>';
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link px-4" href="Contact.php"><span class="material-icons-outlined">
                                    alternate_email
                                </span>Contact</a>
                        </li>
                    </ul>
                    <!--If you are not a member You will see the login on the navbar, but if you login and you are a member yo will see your mail, and the option to logout -->
                    <?php
                    if (!$member || $active == 0) {


                        echo '<form action="../controller/LoginValidation.php" class="form-inline" method="POST">
							
							<input name="email" type="email" class="form-control mb-2 mr-sm-2" 
							size="30" required placeholder="Email">
							
							<input name="password" type="password" class="form-control mb-2 mr-sm-2" placeholder="Password" required/>
							
							<button type="submit" class="btn bg-yellow mb-2"><span class="material-icons-outlined">
                                                        login
                                                        </span>Login</button>
							</form>';
                    } else {
                        
                        echo "<h6 id='currentMail' class='p-3'>$mail</h6>";
                        echo '<form action="../controller/Logout.php">'
                        . '<button class="btn btn-danger" type="submit"><span class="material-icons-outlined">
                        logout
                        </span>Log Out</button>'
                        . '</form>';
                    }
                    ?>

                </div>
            </nav>
        </div>
        <br>
        <!-- END OF THE NAVIGATION BAR -->

        <!-- CONTAINER-->
        <div class="container">

            <!-- ACCORDION-->
            <div id="accordion" class="mt-3">
                <div class="card bg-texture">
                    <div class="card-header gradient" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3 class="acordeon-titulo"><span class="material-icons-outlined mb-2">
                                        edit_calendar
                                    </span>Bookings</h3>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">

                                        <!--DATEPICKER using JQuery to show a calendar-->
                                        Date: <input class="mb-2" type="text" id="datepicker" size="30"><button id="button-reserve" class="btn bg-yellow ml-3" type="button">Reserve</button>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Table for the bookings-->
                                        <h3>Bookings</h3>
                                        <div class="col-12">
                                            <table  class="table table-bordered ">
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
                </div>
                <div class="card bg-texture">
                    <div class="card-header gradient" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h3 class="acordeon-titulo "><span class="material-icons-outlined mb-2">
                                        takeout_dining
                                    </span>Cans</h3>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse p-3" aria-labelledby="headingTwo" data-parent="#accordion">

                        <h3>Production</h3> 


                        <div class="container">
                            <div class="row">
                                <div class="col-11 col-md-4 m-3">
                                    <input class="mt-2 mb-2" type="number" name="Production" placeholder="Production Kg" id="production-kg">
                                    <button id="registerProduction" class="btn bg-yellow ml-3" type="button">Register</button>
                                </div>
                                <div class="mt-3 col-11 col-md-4"><table class="table mx-1 table-bordered" id="production-litros"></table>
                                </div>
                            </div>

                        </div>




                        <!--CARD to divide the cans-->
                        <div class="row justify-content-center" id="cans-container">

                        </div>

                    </div>
                </div>
                <div class="card bg-texture">
                    <div class="card-header gradient" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h3 class="acordeon-titulo "><span class="material-icons-outlined mb-2">
                                        credit_score
                                    </span>Payments</h3>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <!--Table to see the payments-->
                                <div class="col-12 mt-2"> 
                                    <h3>View</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Concept</th>
                                            </tr>
                                        </thead>
                                        <tbody id="account-movements-table">

                                            <!--Javascript content -->
                                        </tbody>
                                    </table>

                                </div>
                            </div>


                            <div class="row">
                                <!--Table to see the fees and to pay them-->

                                <div id="pendent-fees-table" class="col-12 col-lg-6 mt-4 pb-4">
                                    <!
                                    <!--Javascript content -->

                                </div>

                                <!--Table to see the fees and to pay them-->
                                <div id="pendent-tax-table" class="col-12 col-lg-6 mt-4">
                                    <!--   js content-->
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
                <!--ACCORION END-->


            </div>
        </div>
        <br><br>
        <!-- Footer -->
        <footer class="container-fluid bg-dark text-center text-white ml-0 mr-0 mb-0">
            <!-- Section: Text -->
            <section class="mb-4">
                <p class="p">
                    If you want to contact with us here you have our links to send an email, call us, or to send us a message.
                </p>
            </section>
            <!--Email, Call and Sms inside a footer.-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 " align="left">
                    <!-- Copyright -->
                    <a href="mailto:{email}?subject={subject}&body={content}">
                        Send us an email 
                    </a>
                    <span class="material-icons-outlined text-light">
                        mail
                    </span>
                </div>

                <div class="col-lg-4 col-md-6 " align="center">
                    <!-- Copyright -->
                    <a href="tel:{phone}">
                        Call us 
                    </a>
                    <span class="material-icons-outlined text-light">
                        phone
                    </span> 
                </div>

                <div class="col-lg-4 col-md-6 " align="right">
                    <!-- Copyright -->
                    <a href="sms:{phone}?body={content}">
                        Send us a message 
                    </a> 
                    <span class="material-icons-outlined text-light">
                        sms
                    </span>   
                </div>

            </div>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <a class="text-white" href="index.php">ErleteBeekepersAssociation.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../controller/app.js"></script>



        <!--The function to make it work the datapicker-->
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
