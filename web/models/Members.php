<?php

include("TestConexion.php");
/*
 * API MEMBERS
 */
function searchMember($mailP, $passwordP) {
    //Select one member
    //return: 
    //0-dni 1-name 2-surname 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM members WHERE mail='$mailP' and password='$passwordP'";


    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'dni' => $row[0],
            'name' => $row[1],
            'surname' => $row[2],
            'mail' => $row[3],
            'password' => $row[4],
            'account' => $row[5],
            'admin' => $row[6],
            'active' => $row[7]
        );
    }

    mysqli_close($conexion);
    return $results;
}


function searchMembers() {
    //Select active members
    //return: 
    //0-dni 1-name 2-surname 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM members where active=1";


    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'dni' => $row[0],
            'name' => $row[1],
            'surname' => $row[2],
            'mail' => $row[3],
            'password' => $row[4],
            'account' => $row[5],
            'admin' => $row[6],
            'active' => $row[7]
        );
    }

    mysqli_close($conexion);
    return $results;
}