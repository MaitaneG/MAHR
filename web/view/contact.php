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

<!--        NAVIGATION BAR-->
        <div class="container-fluid sticky-top">
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
                            echo '<li class="nav-item">
                                        <a class="nav-link p-3" href="memberPanel.php">Member Panel</a>
                                    </li>';
                        }
                        ?>

                        <li class="nav-item active">
                            <a class="nav-link p-3 active disabled" href="#">Contact</a>
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


<!--    CONTENIDO-->
    
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
    <h2>Location</h2>
    <p><b>Direction:</b> San Juan Plaza 1;
       <b>Municipality:</b> Axpe;
       <b>Province:</b> Bizkaia;
       <b>Postcode:</b> 48291;
       <u><b>GPS Address:</b></u>
       <b>Latitude:</b> 43.1156673 ;
       <b>Length:</b> -2.5982992</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d23302.940519782715!2d-2.603144!3d43.107298!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4fd2f2a4d7a841%3A0xdebc4249323c4949!2sSan%20Juan%20Plaza%2C%201%2C%2048291%20Axpe%2C%20Bizkaia%2C%20Spain!5e0!3m2!1sen!2sus!4v1620634544007!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

</div>
</div>

<div class="row jumbotron" >
  <div class="col-sm-4" align="left">
    <a href="mailto:{email}?subject={subject}&body={content}">
      Send us an email <img src="images/logo gmail.png" width="100px" height="100px">
    </a>
    
  </div>

  <div class="col-sm-4" align="center">
    <a href="tel:{phone}">
      Call us <img src="images/icono llamada.png" width="100px" height="100px">
    </a>
  </div>

  <div class="col-sm-4" align="right">
    <a href="sms:{phone}?body={content}">
      Send us a message <img src="images/icono mensaje.png" width="100px" height="100px">
    </a> 
  </div>
</div>


  </body>
</html>