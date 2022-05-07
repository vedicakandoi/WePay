<?php
    session_start();
    $con = mysqli_connect('localhost','root','');
    $create_db = mysqli_query($con,"CREATE DATABASE IF NOT EXISTS wepay");
    mysqli_select_db($con,"wepay");
    $create_table = mysqli_query($con,"CREATE TABLE IF NOT EXISTS users (username VARCHAR(255), contact VARCHAR(255) PRIMARY KEY, pwd VARCHAR(255))");
    $contact = $_GET['contact'];
    $pwd = $_GET['pwd'];
    $checkExistence = mysqli_query($con,"SELECT * from users where contact = '$contact' and pwd = '$pwd'");
    $num = mysqli_num_rows($checkExistence);
    if ($num==1) {
        echo "success";
        $_SESSION["contact"] = $contact;
    } else {
        echo "Invalid login credentials.";
    }
?>