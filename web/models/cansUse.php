<?php

include("testConexion.php");

//BOOKINGS TABLE API
function selectCanUsed($canId, $date) {
    //Select can using dates
    //return: 
    //0-id 1-date 2-mail 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM using_cans where ID_CANS=$canId AND DATE=$date ";
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

function addCanUse($mail, $id_can, $date) {
    //Insert a new member
    //return string
    include("connect.php");
    $conexion = ConnectDataBase();

    $query = "INSERT INTO using_cans(mail, id_can, date) VALUES('$mail',$id_can','$date')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "successfull";
}

function updateMember($dni, $name, $surname, $mail, $password, $account) {
    //Update member
    //return string
    include("connect.php");
    $conexion = ConnectDataBase();


    $query = "UPDATE members SET dni=$dni, name=$name, surname=$surname, password=$password, account=$account, WHERE mail=$mail";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        return "NO MATCH";
    }
    echo "member edited successfully";
}
