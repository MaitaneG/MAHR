<?php

/**
 * CALL SELECT ALL METHODS ON TABLE BOOKINGS
 */
include("../models/Bookings.php");
include("../models/current_date.php");
$conexion = ConnectDataBase();


if (isset($_POST["bookList"])) {
    $json = selectBookings();

    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if (isset($_POST["date"])) {

    $date = ($_POST["date"]);


    $json = searchReserve($date);
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if (isset($_POST["dateReserve"])) {

    $date = ($_POST["dateReserve"]);
    $mail = ($_POST["mail"]);
      $json = searchReserve($date);
      
     
     if ($json==null) {
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
  





