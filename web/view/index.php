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
		
        <!-- NAVIGATION BAR--> 
        <div class="container-fluid sticky-top mt-0 mx-0  bg-light">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
				</button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active p-3 disabled" href="#">Home<span class="sr-only">(current)</span></a>
						</li>
                        <!--The php code, if you are loged it will apear the member panel but if you are not loged, you won't be able to see it.-->
                        <?php
							if ($member&&$active==1) {
								echo '<li class="nav-item">
								<a class="nav-link p-3" href="profile.php">Profile</a>
								</li>';
								echo '<li class="nav-item">
								<a class="nav-link p-3" href="MemberPanel.php">Member Panel</a>
								</li>';
							}
						?>
						
                        <li class="nav-item">
                            <a class="nav-link p-3" href="Contact.php">Contact</a>
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
							echo '<form action="../controller/Logout.php">'
							. '<input class="btn btn-danger" type="submit" value="Log Out"/>'
							. '</form>';
						}
					?>
					
				</div>
			</nav>
		</div>
        <!-- END OF THE NAVIGATION BAR -->
		
        <!--CONTAINER-->
        <div class="container bg-texture">
            <!--CAROUSEL to make apear some images automatically-->
            <div id="carouselExampleIndicators" class="carousel slide p-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active rounded">
                        <img  loading="lazy"  class="d-block w-100 imag" src="images/Img4.jpg" alt="First slide">
					</div>
                    <div class="carousel-item rounded">
                        <img loading="lazy"  class="d-block w-100 imag" src="images/Img1.jpeg" alt="Second slide">
					</div>
                    <div class="carousel-item rounded">
                        <img loading="lazy"  class="d-block w-100 imag" src="images/Img2.jpg" alt="Third slide">
					</div>
                    <div class="carousel-item rounded">
                        <img loading="lazy"  class="d-block w-100 imag" src="images/Img3.jpg" alt="Fourth slide">
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
                <div class="col-12  p-5" align="center">
					<h2>What is Erlete Beekepers' Association?</h2>
					<p class="">Erlete Beekepers' Association is an association created to
						produce your own honey. It's not easy for little beekeepers on the basis of affection to produce honey. The usual options are to get home as best you can or to go to professional positions, but economically it brings investment or expense. Well, in Durango, they found an alternative: the production of honey for little beekeepers. They want the support of the institutions, convinced that this public investment would return to the environment and to the quality of life of the population.
						
					Along with eight other men and women, the beekeepers who have formed the Erlete Association are Aitor Unzueta, Urdaspal Alberdi, Felix Zabarte, Iñigo Mendibil, Hegoi Escudero, Inazio Uruburu and Roberto Ardanza.</p>
					<p>For an annual fee of 30 euros it is possible to visit the honey extarction local, produce your own honey and take it home. Apart from the annual fee, the member will be required to pay 25 cents per kilo produced.To extract the honey you have to reserve the extractor. After you have used it, you will be authorised to use the honey extractor to store your honey for the next 20 days. </p>
					
					<p><b>Association Porpouse:</b> To serve the regional beekeepers, so that honey can be boarded as well as possible. The characteristics of care, problems and benefits of society.</p>   
				</div>
				
			</div>
			<hr style="height:5px;background-color:#c46404 ">
			<!--Divide a row in 3 colums to put the rules of the association-->
			<div class="row ">
                <div class="col-sm-12 mt-3 p-2" align="center"><h2>Rules</h2></div>
				
                <div class="col-11 col-lg-4 px-4">
					
					<h3 align="center">1. When they bring honey: </h3>
					<ul>
						<li>Don't bring a bee to the honey.</li>
						<li>The doors of the window and car were always locked.</li>
						<li>Once the car's gone, take the car to the parking lot.</li>
						<li>Leave no sign of honey on the porch, keep it clean.</li>
						<li>"The straws do not leave [them] on the ground, but on the foundations prepared.</li>
					</ul>
					
				</div>
                <div class="col-11 col-lg-4 px-4">
					
					<h3 align="center">2. Extracting honey: </h3>
					<ul>
						<li>Don't bring a bee to the honey.</li>
						<li>After inserting the honey that was produced into the madurator, prefix it to the producer's name, name, and date.</li>
						<li>Fill out a file containing data from the honey campaign.</li>
						<li>Make your shop clean and clean for the next one.</li>
					</ul>
				</div>
                <div class="col-11 col-lg-4 px-4">
					
					<h3 align="center">3. The ship of honey: </h3>  
					<ul>
						<li>It will be made in less than 20 days after the honey is extracted.</li>
						<li>Three samples or muestra must be left for each jar of honey.</li>
						<li>Fill in the section corresponding to the launch of the honey chip in the honey campaign.</li>
					</ul>      
				</div>
			</div>
			<br>
			<hr style="height:5px;background-color:#c46404 ">
			<!--The same code of the previous cols-->
			<div class="row ">
                <div class="col-sm-12 p-2 m-2" align="center"><h2>Bees Information</h2>
					
					<img src="images/Gif1.gif" align="right" class="m-2 imagese">
					<p class="p-4">
						Honeybees are flying insects, and close relatives of wasps and ants. They are found on every continent on earth, except for Antarctica.<br><br>
						
						Bees of all varieties live on nectar and pollen. Without bees, pollination would be difficult and time consuming - it is estimated that one-third of the human food supply depends on insect pollination. <br>Bees have a long, straw-like tongue called a probiscus that allows them to drink the nectar from deep within blossoms. Bees are also equipped with two wings, two antennae, and three segmented body parts (the head, the thorax, and the abdomen).&nbsp; Honeybees are social insects that live in colonies.&nbsp; The hive population consists of a single queen, a few hundred drones, and thousands of worker bees.
					</p>
				</div>
			</div>
			<div class="row justify-content-center ">
                <div class="col-11 col-lg-3 p-2 ml-2 "><h5 align="center">Worker Bees</h5>
					
					<img src="images/Abejaobrera.jpg" class="imagese" align="center">
					<p class="p-2">
						Worker bees are the most familiar-looking member of the honeybee hive, as they make up about 99% of each colony's population.<br>
						
						Worker bees are all female, and they do almost everything for the hive. From birth to her death 45 days later, the worker bee is given different tasks to do during different stages of her life. Worker bees are responsible for everything from feeding the larvae (the baby bees), to tending to the queen, to cleaning the hive, to collecting food, to guarding the colony, to building honeycomb.
					</p>
					
				</div>
                <div class="col-11 col-lg-3 p-2 ml-4"><h5 align="center">Drone Bees</h5>
					
					<img src="images/Drone.jpg" class="imagese" align="center">
					<p>
						Male bees are called drones. Their job is to mate with queens from other hives. If they do get the opportunity to mate, they die immediately afterwards. If they do not mate, they can live up to 90 days (that's twice as long as a worker bee!)<br>
						
						You can identify drones in the hive by their big round bodies and large eyes. Drones are incapable of stinging.
						
						
					</p>
					
				</div>
                <div class="col-11 col-lg-3 p-2 ml-4"><h5 align="center">Queen Bees</h5>
					
					<img src="images/Queen.jpg" class="imagese" align="center">
					<p>
						There is one queen bee per hive - she is the mom of all the other bees. She is the only fertile member of the colony, and lays about 1,500 eggs a day during spring and summer.
						<br>
						
						Queen bees are distinguished from the other members of the hive by their long abdomens and small wings. Soon after birth, queen bees will go out and have a wild weeked, where they mate with 15 or more drones over a three day period before retiring to the hive to lay eggs. The queen will not leave the hive again unless the colony swarms (looking for a new home).
						
						
						
					</p>
					
				</div>
			</div>
		</div>
		<br><br>
		
		
		<!-- Footer -->
		<footer class="container-fluid bg-dark text-center text-white ">
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
				<a class="text-white" href="Index.php">ErleteBeekepersAssociation.com</a>
			</div>
			<!-- Copyright -->
		</footer>
		<!-- Footer -->
		
		
		<!--The necesary scripts to make it work the bootsatrap classes-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
	</body>
</html>				
