<?php

include("../models/Bookings.php");
 $returned=searchReserve("2021-05-12");
 echo $returned[0]["mail"];
 
 
 
 
 