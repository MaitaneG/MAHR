<?php
error_reporting(0);
session_start();

$logged = $_SESSION["submitted"];
if ($_SESSION["member"]) {
    $member = $_SESSION["member"];
    $mail = $member[0]["mail"];
    $admin = $member[0]["admin"];
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
                        if ($member) {
                            echo '<li class="nav-item active">
                                        <a class="nav-link p-3 active disabled" href="#">Profile</a>
                                    </li>';
                            echo '<li class="nav-item">
                                        <a class="nav-link p-3" href="memberPanel.php">Member Panel</a>
                                    </li>';
                        }
                        ?>

                        <li class="nav-item ">
                            <a class="nav-link p-3" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <!--If you are not a member You will see the login on the navbar, but if you login and you are a member yo will see your mail, and the option to logout -->
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


        <!--CONTENIDO-->
        <div class="container bg-texture">
            <div class="row">
                <div class="col-sm-12 mt-3 p-2" align="center"><h2>Profile</h2></div>
                <div class="col-6 col-lg-6 px-4" align="right">   
                <img src="images/user.png" class="userimag">
                </div>
                <div class="col-6 p-4 col-lg-6 px-4 user-ul" align="left"> 
                <ul>
                    <li>DNI:</li>
                    <li>Name:</li>
                    <li>Surname:</li>
                    <li>Email:</li>
                </ul>

                </div>
            </div>

        
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>
</html>