<?php

include("testConexion.php");

//BOOKINGS TABLE API
function selectBookings() {
    //Select full list of bookings
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM bookings";
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
    mysqli_free_result($row);
    mysqli_close($conexion);
    return $results;
}

function searchReserve($date) {
    //Select reserve of a selected day
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM bookings WHERE date='$date";
    $stmt = $conexion->prepare($query);

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
    mysqli_free_result($row);
    mysqli_close($conexion);
    return $results;
}

function addReserve($date, $mail) {
    //Add a new reserve
    //return String
    include("connect.php");
    $conexion = ConnectDataBase();

    $query = "INSERT INTO members(date, mail) VALUES('$date',$mail')";
    $result = mysqli_query($conexion, $query);
    mysqli_free_result($row);
    mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "reserve done";
}

function deleteReserve($date, $mail) {
    //Delete a reserve
    //return string
    include("connect.php");
    $conexion = ConnectDataBase();

    $query = "DELETE FROM bookings where date=$date and mail=$mail";
    $result = mysqli_query($conexion, $query);
    mysqli_free_result($row);
    mysqli_close($conexion);
    if (!$result) {

        return "NO MATCH";
    }
    return "reserve deleted";
}
