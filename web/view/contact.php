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
?>

<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
              rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="styles/styles.css">

        <title>Erlete beekepers' association</title>
    </head>
    <body class="url">

        <div class="jumbotron bg-yellow mb-0">
            <h1>Erlete Beekepers' Association</h1>

        </div>

        <!--        NAVIGATION BAR-->
        <div class="container-fluid sticky-top mt-0 mx-0  bg-light">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link p-3" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <!--The php code, if you are loged it will apear the member panel but if you are not loged, you won't be able to see it.-->
                        <?php
                        if ($member&&$active==1) {
                            echo '<li class="nav-item">
                                        <a class="nav-link p-3" href="profile.php">Profile</a>
                                    </li>';
                            echo '<li class="nav-item">
                                        <a class="nav-link p-3" href="memberPanel.php">Member Panel</a>
                                    </li>';
                        }
                        ?>

                        <li class="nav-item active">
                            <a class="nav-link p-3 active disabled" href="#">Contact</a>
                        </li>
                    </ul>
                    <!--If you are not a member You will see the login on the navbar, but if you login and you are a member yo will see your mail, and the option to logout -->
                    <?php
                    if (!$member||$active==0) {


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

        <div class="container bg-texture">

            <br>
            <div class="row">

                <div class="col-sm-12 p" align="center">
                    <h2>Location</h2>
                    <p><b>Direction:</b> San Juan Plaza 1;<br>
                        <b>Municipality:</b> Axpe;<br>
                        <b>Province:</b> Bizkaia;<br>
                        <b>Postcode:</b> 48291;<br>
                        <u><b>GPS Address:</b></u><br>
                        <b>Latitude:</b> 43.1156673 ;<br>
                        <b>Length:</b> -2.5982992;</p>
                    <!--The code to put Erlete Beekepers' Association location taking it from google maps-->
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d23302.940519782715!2d-2.603144!3d43.107298!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4fd2f2a4d7a841%3A0xdebc4249323c4949!2sSan%20Juan%20Plaza%2C%201%2C%2048291%20Axpe%2C%20Bizkaia%2C%20Spain!5e0!3m2!1sen!2sus!4v1620634544007!5m2!1sen!2sus" class="iframe mb-5" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                </div>

            </div>

            <!--Php code to see the member list if the person is loged, if not, he or she won't be able to see it. -->
             <?php
                        if ($member) {
                            echo '<hr style="height:5px;background-color:#c46404 ">
                    <div class="row">

                 
                    <div class="col-sm-12 mt-3 p-2" align="center"><h2>Members List</h2></div>
                        <div class="col-6 col-lg-6 px-4 " align="right">
                        <img src="images/user.png" class="userimag">
                </div>
                <div class="col-6 col-lg-6 px-4 " align="left">
                    <ul>

                        <li>Aitor Unzueta</li>
                        <li>Urdaspal Alberdi</li>
                        <li>Felix Zabarte</li>
                        <li>Iñigo Mendibil</li>
                        <li>Hegoi Escudero</li>
                        <li>Inazio Uruburu</li>
                        <li>Roberto Ardanza</li>



                    </ul>
                    
                </div>
                </div>';
                        }
                        ?>
            
            
        
<br>

<!-- Footer -->
<footer class="bg-dark text-center text-white ml-0 mr-0">
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
        
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>
</html>