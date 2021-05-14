<?php


include("../models/cans.php");

if (isset($_POST["elementId"])) {
        $id_can=$_POST["elementId"];
        $mail=$_POST["mail"];
        $today=date("Y-m-d", time());
        $date2=date("Y-m-d",strtotime($today."+ 20 days"));
        addCanUse($mail, $id_can, $today, $date2);
        $json=selectCansById($id_can);
        $jsonstring= json_encode($json);
    echo  $jsonstring;
}