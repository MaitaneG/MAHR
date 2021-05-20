<?php

/**
 * CALL SELECT ALL METHODS ON TABLE BOOKINGS
 */
include("../models/Bookings.php");
include("../models/current_date.php");
$conexion = ConnectDataBase();


if (isset($_POST["bookList"])) {
    $existingCans = selectBookings();

    $jsonstring = json_encode($existingCans);
    echo $jsonstring;
}

if (isset($_POST["date"])) {

    $date = ($_POST["date"]);


    $existingCans = searchReserve($date);
    
    $jsonstring = json_encode($existingCans);
    echo $jsonstring;
}

if (isset($_POST["dateReserve"])) {

    $date = ($_POST["dateReserve"]);
    $mail = ($_POST["mail"]);
      $existingCans = searchReserve($date);
      
     
     if ($existingCans==null) {
         addReserve($date, $mail);
         echo 1;
     }
     else{
        echo 0;
    }
}

if (isset($_POST["id"])) {

    $id = ($_POST["id"]);
   
      deleteReserve($id);
      
}
  
mysqli_close($conexion);

