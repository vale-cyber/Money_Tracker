<?php
include 'db.php';

    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];


    $insert = "INSERT INTO `transaction` (amount, category, comments, `date`) VALUES ('$amount', '$category', '$comment', '$date');";
    mysqli_query($mysqli, $insert);

    header("Location: ../index.php");

