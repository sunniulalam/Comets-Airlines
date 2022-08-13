<?php
session_start();
$pass_id="";
$fname="";
$lname="";
$age="";
$email="";
$password1="";
$password2="";

$conn= mysqli_connect('localhost', 'root', '', 'flightdb');
if(isset($_POST['reg_user'])) {
    $pass_id= mysqli_real_escape_string($conn, $_POST['pass_id']);
    $fname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $age= mysqli_real_escape_string($conn, $_POST['age']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password1= mysqli_real_escape_string($conn, $_POST['password1']);
    $password2= mysqli_real_escape_string($conn, $_POST['password2']);

    if(empty($pass_id)||empty($fname)||empty($lname)||empty($age)||empty($email)||empty($password1)||empty($password2)){
        echo "Please fill in all fields.";
    }else if($password1 != $password2){
        echo "Passwords must match.";
    }else if(!(str_contains($email, '@') && str_contains($email, '.edu'))){
        echo "Email must contain '@' and '.edu'.";
    }/*else if(!(preg_match($pass_id, "/^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$/"))){
        echo "PassengerID must be in the (ddd)ddd-dddd format";
    }*/else if(strlen($password1)<8){
        echo "Password must be at least 8 characters.";
    }else{
        $sql="INSERT INTO users VALUES('$pass_id','$fname', '$lname', '$age', '$email', '$password1', 0)";
        mysqli_query($conn, $sql);
        $_SESSION['username'] = $pass_id;
        $_SESSION['sucess'] = "You are now logged in";
        header('location: flights.php');
    }

}
