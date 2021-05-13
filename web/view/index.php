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
<!-- One way to present a title and content in a very prominent way on a page-->
        <div class="jumbotron bg-yellow mb-0">
            <h1>Erlete Beekepers' Association</h1>

        </div>

        <!--        NAVIGATION BAR-->
        <div class="container-fluid sticky-top mt-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active p-3 disabled" href="#">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                        if ($member) {
                            echo '<li class="nav-item">
                                        <a class="nav-link p-3" href="memberPanel.php">Member Panel</a>
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
                        echo "<h6 class='p-3'>$mail</h6>";
                        echo '<form action="../controller/logout.php">'
                        . '<input class="btn btn-danger" type="submit" value="Log Out"/>'
                        . '</form>';
                    }
                    ?>

                </div>
            </nav>
        </div>
<!-- END OF THE NAVIGATION BAR -->

        <!--CONTAINER-->
        <div class="container" style="background-color: #FAE75B">
            <!--CAROUSEL to make apear some images automatically-->
            <div id="carouselExampleIndicators" class="carousel slide p-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img  loading="lazy"  class="d-block w-100" src="images/img4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img loading="lazy"  class="d-block w-100" src="images/img1.jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img loading="lazy"  class="d-block w-100" src="images/img2.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img loading="lazy"  class="d-block w-100" src="images/img3.jpg" alt="Fourth slide">
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
            <!--END of the CAROUSEL -->
            <br>
            <div class="row">
                <div class="col-sm-12  p-2" align="center">
                    <h2>What is Erlete Beekepers' Association?</h2>
                    <p>Erlete Beekepers' Association is an association created to
                        produce your own honey. For an annual fee of 30 euros it is possible to visit the honey extarction local, produce your own honey and take it home. Apart from the annual fee, the member will be required to pay 25 cents per kilo produced.</p>
                    <p>To extract the honey you have to reserve the extractor. After you have used it, you will be authorised to use the honey extractor to store your honey for the next 20 days. </p>

                    <p><b>Association Porpouse:</b>To serve the regional beekeepers, so that honey can be boarded as well as possible. The characteristics of care, problems and benefits of society.</p>   
                </div>

                </div>
                <hr style="height:5px;background-color:#c46404 ">
                <!--dive a row in 3 colums to put the rules of the association-->
                <div class="row ">
                <div class="col-sm-12 mt-3 p-2" align="center"><h2>Rules</h2></div>
                
                <div class="col-sm-4 p-2">

                    <h3 align="center">1. When they bring honey: </h3>
                    <p>- Don't bring a bee to the honey.<br>
                       - The doors of the window and car were always locked.<br>
                       - Once the car's gone, take the car to the parking lot.<br>
                       - Leave no sign of honey on the porch, keep it clean.<br>
                       - "The straws do not leave [them] on the ground, but on the foundations prepared.</p>
                </div>
                <div class="col-sm-4 p-2">

                    <h3 align="center">2. Extracting honey: </h3>
                    <p>- Don't bring a bee to the honey.<br>
                       - After inserting the honey that was produced into the madurator, prefix it to the producer's name, name, and date.<br>
                       - Fill out a file containing data from the honey campaign.<br>
                       - Make your shop clean and clean for the next one.</p>
                </div>
                <div class="col-sm-4 p-2">

                    <h3 align="center">3. The ship of honey: </h3>        
                    <p>- It will be made in less than 20 days after the honey is extracted.<br>
                       - Three samples or muestra must be left for each jar of honey.<br>
                       - Fill in the section corresponding to the launch of the honey chip in the honey campaign.</p>
                </div>
</div>
                <br>
                <hr style="height:5px;background-color:#c46404 ">
                <!--The same code of the previous cols-->
                <div class="row ">
                <div class="col-sm-12 p-2 m-2" align="center"><h2>Bees Information</h2>
                    <p>
                    <img src="images/gif1.gif" style="border-radius: 10%" alt="3 types of honeybees" align="right" class="mr-2">
                    
                        Honeybees are flying insects, and close relatives of wasps and ants. They are found on every continent on earth, except for Antarctica.<br><br>

                        Bees of all varieties live on nectar and pollen. Without bees, pollination would be difficult and time consuming - it is estimated that one-third of the human food supply depends on insect pollination. <br>Bees have a long, straw-like tongue called a probiscus that allows them to drink the nectar from deep within blossoms. Bees are also equipped with two wings, two antennae, and three segmented body parts (the head, the thorax, and the abdomen).&nbsp; Honeybees are social insects that live in colonies.&nbsp; The hive population consists of a single queen, a few hundred drones, and thousands of worker bees.
                       </p>
</div>
</div>
<div class="row justify-content-center ">
<div class="col-sm-3 p-2 ml-2 "><h5 align="center">Worker Bees</h5>

                    <img src="images/abejaobrera.jpg" height="140px" style="border-radius: 10%"  alt="3 types of honeybees" align="center">
                    <p class="p-2">
                        Worker bees are the most familiar-looking member of the honeybee hive, as they make up about 99% of each colony's population.<br>
                        
        Worker bees are all female, and they do almost everything for the hive. From birth to her death 45 days later, the worker bee is given different tasks to do during different stages of her life. Worker bees are responsible for everything from feeding the larvae (the baby bees), to tending to the queen, to cleaning the hive, to collecting food, to guarding the colony, to building honeycomb.
                       </p>

</div>
<div class="col-sm-3 p-2 ml-4"><h5 align="center">Drone Bees</h5>

                    <img src="images/Drone.jpg" height="140px" style="border-radius: 10%"  alt="3 types of honeybees" align="center">
                    <p>
                    Male bees are called drones. Their job is to mate with queens from other hives. If they do get the opportunity to mate, they die immediately afterwards. If they do not mate, they can live up to 90 days (that's twice as long as a worker bee!)<br>

        You can identify drones in the hive by their big round bodies and large eyes. Drones are incapable of stinging.
        
                
                       </p>

</div>
<div class="col-sm-3 p-2 ml-4"><h5 align="center">Queen Bees</h5>

                    <img src="images/queen.jpg" height="140px" style="border-radius: 10%"  alt="3 types of honeybees" align="center">
                    <p>
                    There is one queen bee per hive - she is the mom of all the other bees. She is the only fertile member of the colony, and lays about 1,500 eggs a day during spring and summer.
                    <br>
                    
        Queen bees are distinguished from the other members of the hive by their long abdomens and small wings. Soon after birth, queen bees will go out and have a wild weeked, where they mate with 15 or more drones over a three day period before retiring to the hive to lay eggs. The queen will not leave the hive again unless the colony swarms (looking for a new home).
        
        
                
                       </p>

</div>
</div>
            </div>





        </div>
        <!--The necesary scripts to make it work the bootsatrap classes-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>
</html>