<?php

include("testConexion.php");

//BOOKINGS TABLE API
function selectCanUsed($canId) {
    //Select can using dates
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
     $today=date("Y/m/d", time());
    $query = "SELECT * FROM using_cans where ID_CAN=$canId AND DATE_END>=$today ";
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

function addCanUse($mail, $id_can, $date) {
    //Insert a new use day
    //return string
    include("connect.php");
    $conexion = ConnectDataBase();

    $query = "INSERT INTO using_cans(mail, id_can, date) VALUES('$mail',$id_can','$date')";
    $result = mysqli_query($conexion, $query);
      mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "successfull";
}

function deleteCanUse($mail, $id_can, $date) {
    //Delete can use day
    //return string
    include("connect.php");
    $conexion = ConnectDataBase();

    $query = "DELETE FROM using_cans where date=$date and mail=$mail";
    $result = mysqli_query($conexion, $query);
      mysqli_close($conexion);
    if (!$result) {
        return "NO MATCH";
    }
    echo "registry deleted successfully";
}
