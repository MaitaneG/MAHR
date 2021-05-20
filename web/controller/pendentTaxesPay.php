<?php

include("../models/Productions.php");
include("../models/Account.php");


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

