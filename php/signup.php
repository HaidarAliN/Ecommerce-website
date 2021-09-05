<?php
include "connection.php";
if(isset($_POST["first_name"]) && $_POST["first_name"] != "" && strlen($_POST["first_name"]) >= 3) {
    $first_name = $_POST["first_name"];
}else{
    die ("Enter a valid input1");
}

if(isset($_POST["last_name"]) && $_POST["last_name"] != "" && strlen($_POST["last_name"]) >= 3) {
    $last_name = $_POST["last_name"];
}else{
    die ("Enter a valid input2");
}


if(isset($_POST["email"]) && $_POST["email"] != "" && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
    $email = $_POST["email"];
}else{
    die ("Enter a valid input3");
}


if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    die ("Enter a valid input4");
}

if(isset($_POST["confirmPassword"]) && $_POST["confirmPassword"] != ""  &&($_POST["password"]==$_POST["confirmPassword"])) {
    $confirmPassword = $_POST["confirmPassword"];
}else{
    die ("Enter a valid input5");
}

if(isset($_POST["type"]) && $_POST["type"] != "" ) {
    $type = $_POST["type"];
}else{
    die ("Enter a valid input6");
}

if(isset($_POST["address"]) && $_POST["address"] != "" && strlen($_POST["address"]) > 4 ) {
    $address = $_POST["address"];
}else{
    die ("Enter a valid input7".$_POST["address"]);
}


$sql1="Select * from users where email=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
$sql2 = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `type`, `address`) VALUES (?, ?, ?, ?, ?, ?);"; 
$hash = hash('sha256', $password);
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ssssis",$first_name,$last_name,$email,$hash,$type,$address);
$stmt2->execute();
$result2 = $stmt2->get_result();
session_start();
$_SESSION["flash"] = "";
header('location: ../login.html');
}
else{
    session_start();
    $_SESSION["flash"] = "This email is taken";
    header('location: ../signup.html');
}
?>