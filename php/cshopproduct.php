<?php 
include "connection.php";
		$sql2="Select * from items where shop_id=?"; 
		$stmt2 = $connection->prepare($sql2);
		$stmt2->bind_param("i",$_GET['sid']);
		$stmt2->execute();
		$result2 = $stmt2->get_result();

?>