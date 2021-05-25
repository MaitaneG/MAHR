

<?php


include("Members.php");
$json= updateMember("11111A","Maya","Abeja","maya@erlete.eus");
$jsonstring= json_encode($json);
echo $jsonstring;
