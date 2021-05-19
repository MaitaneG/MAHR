

<?php

<<<<<<< HEAD


include("Fees.php");


    if (selectPendentFees("mocholo@mail.com")) {
         $json =selectPendentFees("mocholo@mail.com");
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{
        echo "nada";
    }
=======
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
            'id' => $row[1]
        );
    }

    mysqli_close($conexion);
    return $results;
}

echo json_encode(selectPendentTaxes("member@mail.com"));
>>>>>>> be1142c754dc6531329eb7a464cba4eb33f83aaf
