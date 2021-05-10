<?php

include("testConexion.php");

//USERS TABLE API
//function searchMembers() {
//    //Select full list of members
//    //return: 
//    //0-dni 1-name 2-surname 3-mail 4-password 5-account 6-admin
//    $conexion = ConnectDataBase();
//    $query = "SELECT * FROM members";
//    $result = mysqli_query($conexion, $query);
//    if (!$result) {
//        die("Query error" . mysqli_error($conexion));
//    }
//    $results = array();
//    while ($row = mysqli_fetch_array($result)) {
//        $results[] = array(
//            'dni' => $row[0],
//            'name' => $row[1],
//            'surname' => $row[2],
//            'mail' => $row[3],
//            'password' => $row[4],
//            'account' => $row[5],
//            'admin' => $row[6]
//        );
//    }
//    mysqli_free_result($row);
//    $stmt->close();
//    mysqli_close($conexion);
//    return $results;
//}

//function searchMember($mailP, $passwordP) {
//    //Select one member
//    //return: 
//    //0-dni 1-name 2-surname 3-mail 4-password 5-account 6-admin
//    $conexion = ConnectDataBase();
//    $query = "SELECT * FROM members WHERE mail=? and password=?";
//    $stmt = $conexion->prepare($query);
//    $stmt->bind_param("ss", $mail, $password);
//
//    $mail = $mailP;
//    $password = $passwordP;
//    $stmt->execute();
//
//
//
//    $result = mysqli_query($conexion, $query);
//    if (!$result) {
//        die("Query error" . mysqli_error($conexion));
//    }
//    $results = array();
//    while ($row = mysqli_fetch_array($result)) {
//        $results[] = array(
//            'dni' => $row[0],
//            'name' => $row[1],
//            'surname' => $row[2],
//            'mail' => $row[3],
//            'password' => $row[4],
//            'account' => $row[5],
//            'admin' => $row[6]
//        );
//    }
//    mysqli_free_result($row);
//    mysqli_close($conexion);
//    return $results;
//}


function searchMember($mailP, $passwordP) {
    //Select one member
    //return: 
    //0-dni 1-name 2-surname 3-mail 4-password 5-account 6-admin
    $conexion = ConnectDataBase();
    $query = "SELECT * FROM members WHERE mail='$mailP' and password='$passwordP'";


    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query error" . mysqli_error($conexion));
    }
    $results = array();
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'dni' => $row[0],
            'name' => $row[1],
            'surname' => $row[2],
            'mail' => $row[3],
            'password' => $row[4],
            'account' => $row[5],
            'admin' => $row[6]
        );
    }
 
    mysqli_close($conexion);
    return $results;
}
//function addMember($dni, $name, $surname, $mail, $password, $account) {
//    //Insert a new member
//    //return string
//    include("connect.php");
//    $conexion = ConnectDataBase();
//
//    $query = "INSERT INTO members(dni, name, surname, mail, password, account) VALUES('$dni',$name','$surname', '$mail', '$password', '$account')";
//    $result = mysqli_query($conexion, $query);
//    if (!$result) {
//        return "SERVER ERROR";
//    }
//    echo "member added successfully";
//}
//
//function updateMember($dni, $name, $surname, $mail, $password, $account) {
//    //Update member
//    //return string
//    include("connect.php");
//    $conexion = ConnectDataBase();
//
//
//    $query = "UPDATE members SET dni=$dni, name=$name, surname=$surname, password=$password, account=$account, WHERE mail=$mail";
//    $result = mysqli_query($conexion, $query);
//    if (!$result) {
//        return "NO MATCH";
//    }
//    echo "member edited successfully";
//}
//
//function deleteMember($dni, $name, $surname, $mail, $password, $account) {
//    //Delete a member
//    //return string
//    include("connect.php");
//    $conexion = ConnectDataBase();
//
//    $query = "UPDATE members SET dni=$dni, name=$name, surname=$surname, password=$password, account=$account, WHERE mail=$mail";
//    $result = mysqli_query($conexion, $query);
//    if (!$result) {
//        return "NO MATCH";
//    }
//    echo "member deleted";
//}
