
<?php

 include("testConexion.php");

//FEES TABLE API
function selectFeesMail($mail) {
   
    //Select total fees list for a mail
    //return: 
    //0-id_fee 1-year 2-mail 3-year 4-payed
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
            'amount' => $row[3],
            'payed' => $row[4]
        );
    }
    
    mysqli_close($conexion);
    return $results;
}

function selectPendentFees($mail) {
    //Select total fees list for a mail
    //return: 
    //0-id_fee 1-year 2-mail 3-year 4-payed
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM fees WHERE mail='$mail' AND PAYED='0'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'year' => $row[1],
            'mail' => $row[2],
            'amount' => $row[3]
           
        );
    }
    mysqli_close($conexion);
    return $results;
}



function updateFeePayed($mail) {
   
    //Add a new reserve
    //return String
    $conexion = ConnectDataBase();
    $query = "UPDATE fees SET payed=1 where mail='$mail'";
    $result = mysqli_query($conexion, $query);
  
    mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "payed ok";
}

function addPaymentFee($mail, $amount, $concept) {
    
    
    $today=date("Y/m/d", time());
    $conexion = ConnectDataBase();
    $query = "INSERT INTO account(payer, amount, concept, date) VALUES('$mail','$amount','$concept','$today')";
    $result = mysqli_query($conexion, $query);
    mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "payment registered";
}



