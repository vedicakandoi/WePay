<?php
    session_start();
    $con = mysqli_connect('localhost','root','');
    $create_db = mysqli_query($con,"CREATE DATABASE IF NOT EXISTS wepay");
    mysqli_select_db($con,"wepay");
    $create_table = mysqli_query($con,"CREATE TABLE IF NOT EXISTS users (username VARCHAR(255), contact VARCHAR(255) PRIMARY KEY, pwd VARCHAR(255))");
    // if (!$create_table) {
    //     echo("Table creation error");
    // } else {
    //     echo("Table created.");
    // }
    $contact = $_GET['contact'];
    $checkExistence = mysqli_query($con,"SELECT * from users where contact = '$contact'");
    $num = mysqli_num_rows($checkExistence);
    if ($num==1) {
        echo "fail";
    } else {
        $name = $_GET['name'];
        $pwd = $_GET['pwd'];
        $insert_record = mysqli_query($con,"INSERT INTO users VALUES ('$name','$contact','$pwd')");
        $_SESSION["contact"] = $contact;
        echo "success";
    }
?>