<?php
include "connection.php";
$response = [];
$email = $_POST['email'];

$sql="SELECT * FROM `users` where email = $email";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if(empty($row)){
$response[0]['response']= 0;
}
else{
$response[0]['response']= 1;
}

header("Content-Type: JSON");
echo json_encode($response, JSON_PRETTY_PRINT);


?>