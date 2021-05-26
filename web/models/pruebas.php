

<?php


include("Members.php");
$json=searchMemberByDni("11111A");
$jsonString=json_encode($json);
echo $jsonString;