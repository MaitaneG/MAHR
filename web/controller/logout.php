

<?php
/*
 * LOGOUT
 */
session_start();
session_destroy();
header("location:../view/Index.php");
?>