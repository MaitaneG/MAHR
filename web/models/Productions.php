<?php

include("testConexion.php");

//PRODUCTIONS TABLE API
function selectProductionsMail($mail) {
    //Select productions list of productions for a mail
    //return: 
    //0-mail 1-id_pro 2-date 3-kilos 4-tax 5-payed
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM productions where mail='$mail'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'mail' => $row[0],
            'id_pro' => $row[1],
            'date' => $row[2],
            'kilos' => $row[0],
            'tax' => $row[1],
            'payed' => $row[2]
        );
    }
    mysqli_free_result($row);
    mysqli_close($conexion);
    return $results;
}

function selectProductionDate($date) {
    //Select reserve of a selected day
    //return: String
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM productions WHERE date='$date";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'mail' => $row[0],
            'id_pro' => $row[1],
            'date' => $row[2],
            'kilos' => $row[0],
            'tax' => $row[1],
            'payed' => $row[2]
        );
    }
    mysqli_free_result($row);
    mysqli_close($conexion);
    return $results;
}

function insertProduction($date, $mail) {
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

