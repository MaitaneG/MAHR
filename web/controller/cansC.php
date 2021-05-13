<?php
include("../models/cans.php");

if (isset($_POST["cansList"])) {

    
       $existingCans =  selectCans();
       
    
    $jsonstring = json_encode($existingCans);
    echo $jsonstring;
}

