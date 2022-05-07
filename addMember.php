<?php
    $con = mysqli_connect('localhost','root','','wepay');
    $groupID = $_GET['groupID'];
    $name = $_GET['name'];
    $update = mysqli_query($con, "UPDATE groups SET participants = CONCAT(participants,',','$name') WHERE groupID = '$groupID'");
    echo "success";
?>