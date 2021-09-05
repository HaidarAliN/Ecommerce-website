<?php
session_start();
include "connection.php";
$sql="Select * from users where id=?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param("i",$_SESSION["id"]);
	$stmt->execute();
	$result1 = $stmt->get_result();
	$row1 = $result1->fetch_assoc();
	if($row1["type"]==0)
	{
		$_SESSION["id"] = $row1["id"];
		header('location: ../customerhome.php');
	}
	else
	{
		$_SESSION["id"] = $row["id"];
		header('location: ../ownerhome.php');
	}

?>