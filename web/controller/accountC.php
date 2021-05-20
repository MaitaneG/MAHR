<?php

include("../models/Account.php");

if (isset($_POST["currentMail"])) {
    $mail =$_POST["currentMail"];

    $json = selectAccountMoves($mail);


    $jsonstring = json_encode($json);
    echo $jsonstring;
}

