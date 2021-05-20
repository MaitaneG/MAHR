<?php

include("../models/Fees.php");
if (isset($_POST["pendentFeesConfirm"])) {
    $mail = $_POST["currentMail"];
    if (json_encode(selectPendentFees($mail))!="[]") {
         $json=selectPendentFees($mail);
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

if (isset($_POST["confirmFees"])) {
    $mail = $_POST["mail"];
    $FeesToPay = selectPendentFees($mail);
    foreach ($FeesToPay as $fee) {
        $amount = $fee["amount"];
        $concept = $fee["year"];
        addPaymentFee($mail, $amount, $concept);
        updateFeePayed($mail);
    } 
}

