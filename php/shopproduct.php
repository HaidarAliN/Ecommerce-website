<?php 
include "connection.php";
		$sql2="Select * from items where shop_id=? and active = 1"; 
		$stmt2 = $connection->prepare($sql2);
		$stmt2->bind_param("i",$_SESSION["shopid"]);
		$stmt2->execute();
		$result2 = $stmt2->get_result();

?>