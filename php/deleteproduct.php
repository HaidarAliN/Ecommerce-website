<?php 

require_once "connection.php";
session_start();
$id=$_GET['pid'];
$sql= "DELETE FROM items WHERE id = $id";
$result = $connection->query($sql);

header('location: ../products.php');

?>