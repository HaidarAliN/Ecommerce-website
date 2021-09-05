<?php 

require_once "connection.php";
session_start();
$iid=$_GET['iid'];
$rid=$_GET['rid'];
$sql= "DELETE FROM items_in_receipt WHERE item_id = $iid and receipt_id=$rid";
$result = $connection->query($sql);

header('location: ../card.php');

?>