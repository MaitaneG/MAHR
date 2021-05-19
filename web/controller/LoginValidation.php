
<?php
/**
 * Login validation
 * 
*/
session_start();
$_SESSION["submitted"] ="";
//error_reporting(0);

include("../models/Members.php");

$member= (searchMember($_POST["email"], $_POST["password"]));
if (!$member) {
    $_SESSION["submitted"] = "not logged";
} else {
    $_SESSION["submitted"] = "logged";
    $_SESSION["member"] = $member;
 
}

header("location:../view/index.php");
?>







