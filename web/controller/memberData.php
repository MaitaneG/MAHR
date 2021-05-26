<?php 
session_start();
//Update the data of the member profile.
include("../models/Members.php");
$dni = $_POST["dataDni"];
$name = $_POST["dataName"];
$surname = $_POST["dataSurname"];
$mail = $_POST["dataMail"];



updateMember ($dni, $name, $surname, $mail);
$member=searchMemberByMail($mail);
echo json_encode($member);
$_SESSION["member"]= $member;

header("location:../view/profile.php");
?>