<?php


function ConnectDataBase() {
    // conectar con la base de datos
    //$conexion = mysqli_connect("btkd4fugj67roxefnqpx-mysql.services.clever-cloud.com", "urojaxibigfd3tey", "ZSy7SoXUJhC4yqyrMokh");
    $conexion = mysqli_connect("localhost:3306", "usuario1", "user123");
    if (!($conexion)) {
        echo "There is an error connecting the server.";
        exit();
    }
    if (!mysqli_select_db($conexion, "erlete")) { //Vieja: btkd4fugj67roxefnqpx
        echo "There is an error selecting the DB.";
        exit();
    }
    return $conexion;
}