

<?php



function selectAccountMoves($mail) {

include("TestConexion.php");
    $conexion = ConnectDataBase();
   
    $query = "SELECT * FROM account where payer='$mail' ORDER BY date ASC";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id' => $row[0],
            'date' => $row[3],
            'mail' => $row[1],
            'amount'=>$row[4],
            'concept'=>$row[5]
        );
    }

    mysqli_close($conexion);
    return $results;
}

 $json=selectAccountMoves("mocholo@mail.com");
    $jsonstring = json_encode($json);
    echo $jsonstring;;