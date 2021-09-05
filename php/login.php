<?php
session_start();
include "connection.php";

if (isset($_POST["email"]) and $_POST["email"] !="" && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		$email = $_POST["email"];
	}else
	{
		header('location: ../login.html');
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		header('location: ../login.html');

	}
$hash = hash('sha256', $password);
$sql1="Select * from users where email=? and password=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$email,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	$_SESSION["flash"] = "Please check your email and password";
	header('location: ../login.html');
}
else{
	
	if($row["type"]==0){
	$_SESSION["id"] = $row["id"];
	$_SESSION["type"] = $row["type"];
	header('location: ../customerhome.php');
	}
	else
	{

		$sql2="Select * from shops where user_id=?"; 
		$stmt2 = $connection->prepare($sql2);
		$stmt2->bind_param("i",$row["id"]);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$row2 = $result2->fetch_assoc();
		if(empty($row2)){
			$_SESSION["id"] = $row["id"];
		$_SESSION["type"] = $row["type"];
		header('location: ../createshop.php');
		}else{

		$_SESSION["id"] = $row["id"];
		$_SESSION["type"] = $row["type"];
	header('location: ../ownerhome.php');}
	}
}
?>