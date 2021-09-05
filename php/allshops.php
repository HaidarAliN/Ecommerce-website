<?php 
include "connection.php";
		$sql2="Select * from shops"; #Check if the email already exists in the database
		$stmt2 = $connection->prepare($sql2);
		$stmt2->execute();
		$result = $stmt2->get_result();
?>