<?php
include "connection.php";
session_start();
$user_id = $_SESSION["id"];

$sql="SELECT id FROM `receipts` where user_id = $user_id and status= 0";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$receipt_id = $row['id']; //get the id of the receipt

$sql2="SELECT ir.item_id FROM `items_in_receipt` as ir, `items` as i  WHERE i.id = ir.item_id and ir.receipt_id = $receipt_id and i.quantity > 0";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$item_id_arr = []; //get the id of all the items in the receipt
while($row2 = $result2->fetch_assoc()){
	$item_id_arr[] = $row2['item_id'];
}

$current_quantity = []; // get the current quantity
foreach ($item_id_arr as $value) {
	$sql3="SELECT `quantity` FROM `items` WHERE id = $value";
	$stmt3 = $connection->prepare($sql3);
	$stmt3->execute();
	$result3 = $stmt3->get_result();
	$row3 = $result3->fetch_assoc();
	$current_quantity[] = $row3['quantity'];
}

foreach ($item_id_arr as $key => $value) {
	$new_quantity = $current_quantity[$key] - 1;
	if ($new_quantity<0) {$new_quantity = 0;}
	$sql4 = "UPDATE `items` SET `quantity`=$new_quantity WHERE id = $value";
	$stmt4 = $connection->prepare($sql4);
	$stmt4->execute();
}

$sql5 = "UPDATE `receipts` SET `status`= 1 WHERE id = $receipt_id";//delecte the item from the receit
$stmt5 = $connection->prepare($sql5);
$stmt5->execute();
$_SESSION["success"] = "Purchased successfully";
header('location: ../card.php');



?>