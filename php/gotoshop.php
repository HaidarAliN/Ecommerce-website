<?php 
include "connection.php";
$id=$_GET['sid'];
		$sql="Select * from shops where id=$id"; 
		$stmt = $connection->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

?>