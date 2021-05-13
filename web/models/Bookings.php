<?php

include("TestConexion.php");
function selectBookings() {
    //Select full list of bookings for today and after today
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $today=date("Y/m/d", time());
    $query = "SELECT * FROM bookings where date>='$today' ORDER BY date ASC";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id' => $row[0],
            'date' => $row[1],
            'mail' => $row[2]
        );
    }

    mysqli_close($conexion);
    return $results;
}

function searchReserve($date) {
    //Select reserve of a selected day
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
     $today=date("Y/m/d", time());
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM bookings WHERE date='$date' and date>='$today' ORDER BY date ASC";
   

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id' => $row[0],
            'date' => $row[1],
            'mail' => $row[2]
        );
    }

    mysqli_close($conexion);
    return $results;
}

function addReserve($date, $mail) {
    //Add a new reserve
    //return String
 
    $conexion = ConnectDataBase();

    $query = "INSERT INTO bookings(date, mail) VALUES('$date','$mail')";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "reserve done";
}

function deleteReserve($id) {
    //Delete a reserve
    //return string
   
    $conexion = ConnectDataBase();

    $query = "DELETE FROM bookings where id_booking=$id";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    if (!$result) {

        return "NO MATCH";
    }
    return "reserve deleted";
}
