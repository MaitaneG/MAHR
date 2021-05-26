<?php

include("../models/Productions.php");

/*
 * INSERT PRODUCTION FROM JS TO PRODUCTIONS API
 */
if (isset($_POST["kilos"])) {
    $mail = $_POST["mail"];
    $kilos = $_POST["kilos"];
    $tax = $_POST["taxes"];

    echo insertProduction($mail, $kilos, $tax);
}

/*
 * FETCH NOT PAYED TAXES FROM API
 */
if (isset($_POST["pendent"])) {
    $mail = $_POST["mail"];
    if (selectPendentTaxes($mail)) {
        $json = selectPendentTaxes($mail);
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}
