

<?php



include("Fees.php");


    if (selectPendentFees("mocholo@mail.com")) {
         $json =selectPendentFees("mocholo@mail.com");
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{
        echo "nada";
    }