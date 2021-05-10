

<?php

session_start();
//error_reporting(0);

include("Members.php");
$member = searchMember($_POST["user_Email"], $_POST["password"]);
if (!$member) {
    echo "mail not registered";
    die();
}
$_SESSION["member"] = $member;
header("location:index.php");
?>







