<?php 
include "connection.php";
$id = $_SESSION["id"];
$sql="SELECT `id` FROM `shops` WHERE user_id = $id"; 
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$flag = false;
$shop_id = $row['id'];
		$sql1="SELECT i.name as name, COUNT(i.id) as countn , sum(i.price) as totalprice FROM `receipts` as r, items_in_receipt as ir, items as i where i.id = ir.item_id and ir.receipt_id = r.id and i.shop_id =$shop_id and r.status = 1 group by (i.id)"; 
		$stmt1 = $connection->prepare($sql1);
		$stmt1->execute();
		$result1 = $stmt1->get_result();
if(empty($row2 =$result1->fetch_assoc())){
	$flag = true;
}
$flag2 = true;
$sql2 = "SELECT  sum(i.price) as totalprice, extract(month from r.date) as month FROM `receipts` as r, items_in_receipt as ir, items as i where i.id = ir.item_id and ir.receipt_id = r.id and i.shop_id =$shop_id and r.status = 1  group by extract(month from r.date) order by (month) ";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
if(empty($row3 = $result2->fetch_assoc())){
	$flag2 = false;
}

?>