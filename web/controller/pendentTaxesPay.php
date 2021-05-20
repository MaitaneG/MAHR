<?php

include("../models/Productions.php");
include("../models/Account.php");

/*
 * INSERT PRODUCTION IN PRODUCTIONS API FROM JS
 */
if (isset($_POST["kilos"])) {
    $mail = $_POST["mail"];
    $kilos = $_POST["kilos"];
    $tax = $_POST["taxes"];

    echo insertProduction($mail, $kilos, $tax);
}

/*
 * FETCH NOT PAYED TAXES FROM PRODUCTIONS API
 */
if (isset($_POST["pendent"])) {
    $mail = $_POST["mail"];
    if (selectPendentTaxes($mail)) {
        $json = selectPendentTaxes($mail);
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

/*
 * EDIT TAXES STATE TO PAYED A INSERT MOVEMNT ON ACCOUNT TABLE
 */
if (isset($_POST["confirm"])) {
    $mail = $_POST["mail"];
    $pendentTaxes=selectPendentTaxes($mail);
    foreach ($pendentTaxes as $pendentTax){
        insertMove($mail, "Tax", $pendentTax["tax"]);
    }
    $payed = editProduction($mail);
    if ($payed > 0) {
        echo "payed";
    } else {
        echo 'error';
    }
}

