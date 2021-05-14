<?php

include("TestConexion.php");

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

    mysqli_close($conexion);
    return $results;
}

function insertProduction($mail, $kg, $tax) {
    //Add a new reserve
    //return String
    
    $conexion = ConnectDataBase();
     $today=date("Y/m/d", time());
    $query = "INSERT INTO productions(mail,date, kilos, tax) VALUES('$mail','$today','$kg','$tax')";
    $result = mysqli_query($conexion, $query);
  
    mysqli_close($conexion);
    if (!$result) {
        return "0";
    }
    return "Registered";
}

function selectPendentTaxes($mail) {
    //Select reserve of a selected day
    //return: String
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM productions WHERE mail='$mail' AND PAYED=0";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'date' => $row[2],
            'tax' => $row[4],
            'payed' => $row[5]
  
        );
    }

    mysqli_close($conexion);
    return $results;
}

function editProduction($mail) {
    //edit payed state
    //return String
    
    $conexion = ConnectDataBase();
    $query = "UPDATE productions set payed=1 WHERE mail='$mail'";
    $result = mysqli_query($conexion, $query);
  
    mysqli_close($conexion);
    if (!$result) {
        return "0";
    }
    return "Registered";
}