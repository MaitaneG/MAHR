<?php


function selectAccountMoves($mail) {
    //Select full list of moves of an account for $mail
    //return: 
    //0-ID_MOVE	1-PAYER	2-COLLECTOR 3-DATE 4-AMOUNT 5-CONCEPT 6-TOTAL
    include("TestConexion.php");
    $conexion = ConnectDataBase();
   
    $query = "SELECT * FROM account where payer='$mail' ORDER BY date ASC";
    $result = mysqli_query($conexion, $query);//Pendiente de terminar
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'id' => $row[0],
            'mail' => $row[1],
            'date' => $row[3],
            'amount' => $row[4],
            'concept' => $row[5]
        );
    }

    mysqli_close($conexion);
    return $results;
}



function insertMove($mail, $concept, $amount) {
    //Select full list of moves of an account for $mail
    //return: 
    //0-ID_MOVE	1-PAYER	2-COLLECTOR 3-DATE 4-AMOUNT 5-CONCEPT 6-TOTAL
    
    $today=date("Y/m/d", time());
    $conexion = ConnectDataBase();
    $query = "INSERT INTO account(date, payer, concept, amount) VALUES('$today','$mail', '$concept','$amount')";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    if (!$result) {
        return $result;
    }
    return "reserve done";
}


