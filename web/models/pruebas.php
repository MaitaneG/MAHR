

<?php

include("TestConexion.php");



function addCanUse($mail, $id_can, $date2) {
    //Insert a new use day
    //return string
  
    $conexion = ConnectDataBase();
    $today=date("Y/m/d", time());
    $query = "INSERT INTO using_cans(mail, id_can, date, date2) VALUES('$mail','$id_can','$today','$date2')";
    $result = mysqli_query($conexion, $query);
      mysqli_close($conexion);
    if (!$result) {
        return "SERVER ERROR";
    }
    return "successfull";
}

$today=date("Y/m/d", time());
echo date("d-m-Y",strtotime($today."+ 20 days"));