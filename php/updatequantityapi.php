<?php
include "connection.php";
$index=0;
$response = [];
$val = $_POST['val'];
$pid = $_POST['pid'];
$sql3="SELECT `quantity` FROM `items` WHERE id = $pid";
$stmt3 = $connection->prepare($sql3);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$current_quantity = $row3['quantity'];

$new_quantity = $current_quantity + $val;

$sql="UPDATE `items` SET `quantity`= $new_quantity WHERE id = $pid";
$stmt = $connection->prepare($sql);
$stmt->execute();

$sql2="SELECT `quantity` FROM `items` WHERE id = $pid";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
while($row2 = $result2	-> fetch_assoc()){
	$response[$index]['quantity'] = $row2['quantity'];
	$index++;
}
header("Content-Type: JSON");
echo json_encode($response, JSON_PRETTY_PRINT);


?>