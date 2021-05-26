<?php 
session_start();
//Update the picture of the profile.
include("../models/Members.php");
$dni = $_POST["pictureDni"];
echo "string";
if ($_FILES["uploadedPicture"]["name"]!=null || $_FILES["uploadedPicture"]["name"] != "") {
$picture = "images/profile/".$dni."_".$_FILES["uploadedPicture"]["name"];
move_uploaded_file($_FILES["uploadedPicture"]["tmp_name"], "../view/".$picture);
updatePicture($picture, $dni);
$member=searchMemberByDni($dni);
$_SESSION["member"]= $member;
}
header("location:../view/profile.php");
?>