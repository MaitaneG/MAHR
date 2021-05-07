
<?php

include("testConexion.php");

//PRODUCTIONS TABLE API
function selectFeesMail($mail) {
    //Select total fees list for a mail
    //return: 
    //0-id_fee 1-year 2-mail 3-payed
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM fees where mail='$mail'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id_fee' => $row[0],
            'year' => $row[1],
            'mail' => $row[2],
            'payed' => $row[3]
        );
    }
    mysqli_free_result($row);
    mysqli_close($conexion);
    return $results;
}

function selectFeeID($id) {
    //Select a fee for Id
    //return: 
    //0-id_fee 1-year 2-mail 3-payed
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM productions WHERE id_fee='$id";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id_fee' => $row[0],
            'year' => $row[1],
            'mail' => $row[2],
            'payed' => $row[3]
        );
    }
    mysqli_free_result($row);
    mysqli_close($conexion);
    return $results;
}

function updateFeePayed($id,$payed) {
    //Add a new reserve
    //return String
    include("connect.php");
    $conexion = ConnectDataBase();

    $query = "UPDATE fees SET payed=$payed where id_fee=$id";
    $result = mysqli_query($conexion, $query);
    mysqli_free_result($row);
    mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "reserve done";
}

