<?php
    $con = mysqli_connect('localhost','root','','wepay');
    $groupID = $_GET['groupID'];
    $title = $_GET['title'];
    $paidBy = $_GET['paidBy'];
    $amount = $_GET['amount'];
    $checkExistence = mysqli_query($con,"SELECT * from expenses where groupID = '$groupID' and expense = '$title'");
    $num = mysqli_num_rows($checkExistence);
    if ($num==1) {
        echo "Expense already exists. Try a different expense title.";
    } else {
        $insert_record = mysqli_query($con,"INSERT INTO expenses(groupID, expense, paidBy, amount) VALUES ('$groupID','$title','$paidBy','$amount')");
        echo "success";
    }
?>