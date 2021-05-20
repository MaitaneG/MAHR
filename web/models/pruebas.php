

<?php




include("Fees.php");
$json=selectPendentFees("member@mail.com");
$jsonstring= json_encode($json);
echo $jsonstring;

