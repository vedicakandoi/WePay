<?php
    $con = mysqli_connect('localhost','root','','wepay');
    $groupID = $_GET['groupID'];
    $update = mysqli_query($con, "DELETE FROM groups WHERE groupID='$groupID'");
    echo "success";
?>