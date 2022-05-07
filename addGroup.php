<?php
    session_start();
    $con = mysqli_connect('localhost','root','','wepay');
    $contact = $_SESSION['contact'];
    $title = $_GET['title'];
    $type = $_GET['type'];
    $participantsList = $_GET['members'];
    $checkExistence = mysqli_query($con,"SELECT * from groups where creatorContact = '$contact' and title = '$title'");
    $num = mysqli_num_rows($checkExistence);
    if ($num==1) {
        echo "Group already exists. Try a different group title.";
    } else {
        $insert_record = mysqli_query($con,"INSERT INTO groups(creatorContact, title, groupType, participants) VALUES ('$contact','$title','$type','$participantsList')");
        echo "success";
    }
?>