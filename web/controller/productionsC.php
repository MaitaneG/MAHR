<?php

include("../models/Productions.php");

if (isset($_POST["kilos"])) {
    $mail = $_POST["mail"];
    $kilos = $_POST["kilos"];
    $tax = $_POST["taxes"];

    echo insertProduction($mail, $kilos, $tax);
}

if (isset($_POST["pendent"])) {
    $mail = $_POST["mail"];
    if (selectPendentTaxes($mail)) {
        $json = selectPendentTaxes($mail);
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
