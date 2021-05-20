<?php
include("../models/Fees.php");
/*
 * FECTH PENDENT FEES A SEND TO JS
 */
if (isset($_POST["pendentFeesConfirm"])) {
    $mail = $_POST["currentMail"];
    if (selectPendentFees($mail)) {
         $json=selectPendentFees($mail);
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

/*
 * CHANGE PENDENT FEES TO PAYED, AND INSERT IN ACCOUNT MOVEMENTS TABLE
 */
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

