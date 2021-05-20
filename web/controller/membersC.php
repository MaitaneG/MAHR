<?php
include("../models/Members.php");

/*
 * FECTH ALL ACTIVE MEMBERS
 */
if (isset($_POST["fetch"])) {

       $json = searchMembers();
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

