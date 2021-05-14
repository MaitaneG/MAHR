

<?php

include("TestConexion.php");


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
            'payed' => $row[5],
            'id'=>$row[1]
  
        );
    }

    mysqli_close($conexion);
    return $results;
}
echo json_encode(selectPendentTaxes("member@mail.com"));