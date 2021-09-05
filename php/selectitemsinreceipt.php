<?php 
include "connection.php";
$flag = true;
$id = $_SESSION["id"];
		$sql1="SELECT * FROM `receipts` WHERE user_id=$id and status=0"; 
		$stmt1 = $connection->prepare($sql1);
		$stmt1->execute();
		$result1 = $stmt1->get_result();
		$row1 = $result1->fetch_assoc();
if(!empty($row1)){
$flag = false;
$rid = $row1['id'];
		$sql2="SELECT * FROM `items_in_receipt` as ir ,`items` as i , `receipts` as r where ir.receipt_id = r.id and ir.item_id = i.id and ir.receipt_id=$rid and r.status = 0"; 
		$stmt2 = $connection->prepare($sql2);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
}
?>