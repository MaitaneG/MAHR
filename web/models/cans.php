<?php

include("CansUse.php");

//CANS TABLE API
function selectCans() {
    //Select existing cans
    //return: 
    //0-id_can 1-capacity
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM cans";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $use = 0;
        $dateEnd = "";
        $mail = "";
        if (viewCanUsed($row[0])) {
            $canUse = viewCanUsed($row[0]);
            $dateEnd = $canUse[0]["date_end"];
            $mail = $canUse[0]["mail"];
            $use = 1;
        } else {
            $use = 0;
        }
        $results[] = array(
            'id' => $row[0],
            'capacity' => $row[1],
            'using' => $use,
            'end_date' => $dateEnd,
            'mail' => $mail
        );
    }
    mysqli_close($conexion);
    return $results;
}

function selectCansById($id) {
    //Select existing cans
    //return: 
    //0-id_can 1-capacity
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM cans WHERE id_can='$id'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id' => $row[0],
            'capacity' => $row[1]
        );
    }
    mysqli_close($conexion);
    return $results;
}
