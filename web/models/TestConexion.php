<?php


function ConnectDataBase() {
    // conectar con la base de datos
    $conexion = mysqli_connect("btkd4fugj67roxefnqpx-mysql.services.clever-cloud.com", "urojaxibigfd3tey", "ZSy7SoXUJhC4yqyrMokh");
    if (!($conexion)) {
        echo "There is an error connecting the server.";
        exit();
    }
    if (!mysqli_select_db($conexion, "btkd4fugj67roxefnqpx")) {
        echo "There is an error selecting the DB.";
        exit();
    }
    return $conexion;
}