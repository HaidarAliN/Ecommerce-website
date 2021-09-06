<?php
include "connection.php";
session_start();
$pid=$_GET['pid'];
$userid = $_SESSION["id"];
$status = 0;

$sql1="Select * from receipts where user_id=? and status = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ii",$userid,$status);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();
if(empty($row1))
{
	$status = 0;
	$sql2="INSERT INTO `receipts`(`user_id`, `status`) VALUES (?, ?)";
	$stmt2 = $connection->prepare($sql2);
	$stmt2->bind_param("ii",$userid, $status);
	$stmt2->execute();

	$sql3="Select * from receipts where user_id=? and status = ?";
	$stmt3 = $connection->prepare($sql3);
	$stmt3->bind_param("ii",$userid,$status);
	$stmt3->execute();
	$result3 = $stmt3->get_result();
	$row3 = $result3->fetch_assoc();
	$rid = $row3['id'];
}
else
{
	$rid = $row1['id'];
}

$sql4="INSERT INTO `items_in_receipt`(`receipt_id`, `item_id`) VALUES (?, ?)";
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("ii",$rid, $pid);
$stmt4->execute();
header('location: ../card.php');

?>