<?php

function parseDate($String){

$fecha = date_create($String);
if (!$fecha) {
    $e = date_get_last_errors();
    foreach ($e['errors'] as $error) {
        echo "$error\n";
    }
    exit(1);
}

return date_format($fecha, 'Y-m-d');
}

