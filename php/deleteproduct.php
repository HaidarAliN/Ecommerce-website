<?php 

require_once "connection.php";
session_start();
$id=$_GET['pid'];
$sql= "UPDATE `items` SET `active`= 0 WHERE id = $id";
$result = $connection->query($sql);

header('location: ../products.php');

?>