<?php

include("../models/Account.php");
/*
 * FETCH ACCOUNT MOVES AND SEND TO JS
 */
if (isset($_POST["currentMail"])) {
    $mail =$_POST["currentMail"];

    $json = selectAccountMoves($mail);


    $jsonstring = json_encode($json);
    echo $jsonstring;
}

