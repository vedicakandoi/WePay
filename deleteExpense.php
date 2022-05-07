<?php
    $con = mysqli_connect('localhost','root','','wepay');
    $groupID = $_GET['groupID'];
    $title = $_GET['title'];
    $update = mysqli_query($con, "DELETE FROM expenses WHERE groupID='$groupID' AND expense='$title'");
    if(!$update) {
        echo "idk";
    } else {
        echo "success";
    }
    
?>