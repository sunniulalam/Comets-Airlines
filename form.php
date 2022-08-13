<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(empty($fname)||empty($lname)||empty($email)||empty($subject)||empty($message)){
        echo "<p>The fields must not be empty.</p>";
    }else if()
?>