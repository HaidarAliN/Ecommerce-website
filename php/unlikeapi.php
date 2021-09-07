<?php
include "connection.php";
$response = [];
$user_id = $_POST['user_id'];
$item_id = $_POST['item_idd'];
//check if user already like the product
$sql1="Select * from users_liked_items where item_id = $item_id and user_id = $user_id";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();
if(!empty($row1)){
$sql1="DELETE FROM `users_liked_items` where user_id = $user_id and item_id = $item_id";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
}



$sql="Select count(item_id) as count from users_liked_items where item_id = $item_id";
$stmt = $connection->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$response[0]['count'] = $row['count'];
header("Content-Type: JSON");
echo json_encode($response, JSON_PRETTY_PRINT);


?>