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
    $md5Password= md5($passwordP);
    $query = "SELECT * FROM members WHERE mail='$mailP' and password='$md5Password'";


    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'dni' => $row[0],
	    'picture' => $row[1],
            'name' => $row[2],
            'surname' => $row[3],
            'mail' => $row[4],
            'password' => $row[5],
            'account' => $row[6],
            'admin' => $row[7],
            'active' => $row[8],
           
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
	    'picture' => $row[1],
            'name' => $row[2],
            'surname' => $row[3],
            'mail' => $row[4],
            'password' => $row[5],
            'account' => $row[6],
            'admin' => $row[7],
            'active' => $row[8],
           
        );
    }

    mysqli_close($conexion);
    return $results;
}

function updateMember($dni, $picture, $name, $surname, $mail){
//Select active members
    //return: 
    //0-dni 1-name 2-surname 3-mail
    $conexion = ConnectDataBase();
    $query = "UPDATE members SET DNI='$dni', PICTURE= '$picture', NAME='$name', SURNAME='$surname' WHERE mail= '$mail'";
    $result = mysqli_query($conexion, $query);
    if(!$result){
          die("Query error". mysqli_error($conexion));

    }

}
