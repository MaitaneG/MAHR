<?php
include("../models/Cans.php");

/*
 * FECTH EXISTIN CANS FROM CANS API
 */
if (isset($_POST["cansList"])) {

    
       $existingCans =  selectCans();
       
    
    $jsonstring = json_encode($existingCans);
    echo $jsonstring;
}

