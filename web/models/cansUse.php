<?php

include("TestConexion.php");

//BOOKINGS TABLE API
function viewCanUsed($canId) {
    //Select can using dates
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
     $today=date("Y/m/d", time());
    $query = "SELECT * FROM using_cans where ID_CAN=$canId AND DATE2>=$today ";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id' => $row[1],
            'date_end' => $row[3],
            'mail' => $row[0]
        );
    }

    mysqli_close($conexion);
    return $results;
}

function addCanUse($mail, $id_can, $today, $date2) {
    //Insert a new use day
    //return string
  
    $conexion = ConnectDataBase();

    $query = "INSERT INTO using_cans(mail, id_can, date, date2) VALUES('$mail','$id_can','$today','$date2')";
    $result = mysqli_query($conexion, $query);
      mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "successfull";
}


