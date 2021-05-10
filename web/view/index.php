<?php
error_reporting(0);
session_start();
$member="menber";
//$logged = $_SESSION["submitted"];
//if ($_SESSION["member"]) {
//    $member = $_SESSION["member"];
//    $mail=$member[0]["mail"];
//    $admin = $member[0]["admin"];
//}
//            if ($logged == "logged") {
//                echo"<script>alert('You are logged');</script>";
//                echo"<script>console.log('$member');</script>";
//                
//            } else if ($logged == "not logged") {
//                echo"<script>alert('You are not logged');</script>";
//            }
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Erlete beekepers' association</title>
    </head>
    <body class="url">

        <div class="jumbotron bg-yellow">
            <h1>Erlete Beekepers' Association</h1>
            
        </div>


        <div class="container-fluid sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active p-3" href="#">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                        if ($member) {
                            echo '<li class="nav-item">
                                        <a class="nav-link p-3" href="#">Member Panel</a>
                                    </li>';
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link p-3" href="contact.html">Contact</a>
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
                        echo "<h6 class='p-3'>$mail</h6>";
                        echo '<form action="../controller/logout.php">'    
                                . '<input class="btn btn-danger" type="submit" value="Log Out"/>'
                           . '</form>';
                    }
                    ?>




                </div>
            </nav>
        </div>



        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/img4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/img1.jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/img2.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/img3.jpg" alt="Fourth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12" align="center">
                    <h2>What is Erlete Beekepers' Association?</h2>
                    <p>Erlete Beekepers' Association is an association created to
                        produce your own honey. For an annual fee of 30 euros it is possible to visit the honey extarction local, produce your own honey and take it home. Apart from the annual fee, the member will be required to pay 25 cents per kilo produced.</p>
                    <p>To extract the honey you have to reserve the extractor. After you have used it, you will be authorised to use the honey extractor to store your honey for the next 20 days. </p>

                    <p><b>Association Porpouse:</b>To serve the regional beekeepers, so that honey can be boarded as well as possible. The characteristics of care, problems and benefits of society.</p>
                </div>

                <div class="col-sm-12" align="center"><h2>Rules</h2></div>



                <div class="col-sm-4">

                    <h3>Rule 1</h3>
                    <p>The first rule is that the member can only reserve the extractor once a day.</p>
                    <p>And the member will have to specify the time he or she is going to go.</p>
                </div>
                <div class="col-sm-4">

                    <h3>Rule 2</h3>
                    <p>There will be a specific day to pay the membership fee, if it is not paid by that day, the member will receive a notice.</p>
                </div>
                <div class="col-sm-4">

                    <h3>Rule 3</h3>        
                    <p></p>
                </div>

                <br>
                <div class="col-sm-12" align="center"><h2>Bees Information</h2></div>


            </div>

    </body>
</html>