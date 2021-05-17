<?php



    /*
     * Select full list of moves of an account for $mail
     * @return 0-ID_MOVE 1-PAYER 2-COLLECTOR 3-DATE 4-AMOUNT 5-CONCEPT 6-TOTAL
     */
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

    /*
     * Select the last quantity of account Total
     *@return 6-TOTAL
    */
function selectAccountTotal() {

include("TestConexion.php");
    $conexion = ConnectDataBase();
   
    $query = "SELECT TOP 1 * FROM account ORDER BY id_move DESC";
    $result = mysqli_query($conexion, $query);//Pendiente de terminar
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'total' => $row[6]
        );
    }

    mysqli_close($conexion);
    return $results;
}

    /*
     *  Add a payment to account 
     * 0-ID 1-PAYER 2-COLLECTOR 3-DATE 4-AMOUNT 5-CONCEPT 6-TOTAL 
     * @return String
     */
function addPayment($mail, $amount, $concept) {
    
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

