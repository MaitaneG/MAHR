<?php

include("cansUse.php");
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
           $use=0;
           $dateEnd="";
           $mail="";
           if (selectCanUsed($row[0])) {
               $canUse=selectCanUsed($row[0]);
                $dateEnd=$canUse[0]["date_end"];
                $mail=$canUse[0]["mail"];
                $use=1;
            
        }else{
            $use=0;
        }
        $results[] = array(
            'id' => $row[0],
            'capacity' => $row[1],
             'using'=> $use,
             'end_date'=>$dateEnd,
             'mail' => $mail 
           
        );
    }
    mysqli_close($conexion);
    return $results;
}

