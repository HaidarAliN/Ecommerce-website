<?php 
session_start();
include "connection.php";
if(isset($_POST["shop_name"]) && $_POST["shop_name"] != "" && strlen($_POST["shop_name"]) >= 3) {
    $shop_name = $_POST["shop_name"];
}else{
    die ("Enter a valid input1");
}

if(isset($_POST["category"]) && $_POST["category"] != "" && strlen($_POST["category"]) >= 3) {
    $category = $_POST["category"];
}else{
    die ("Enter a valid input2");
}

if(empty($_SESSION["id"])){
    header('location: login.html');
  }
if($_SESSION["type"]==0){
    header('location: customerhome.php');
  }

$img_file="../images/".$_FILES['img_file']['name'];
$img_file2="images/".$_FILES['img_file']['name'];
move_uploaded_file( $_FILES["img_file"]["tmp_name"], $img_file);


 if ( true)
 {
 	$sql1="Select * from shops where name=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$shop_name);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
if(empty($row)){
$sql2 = "INSERT INTO `shops` (`user_id`, `name`, `category`, `image_path`) VALUES (?, ?, ?, ?);"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("isss",$_SESSION["id"],$shop_name,$category,$img_file2);
$stmt2->execute();
$result2 = $stmt2->get_result();
session_start();
$_SESSION["flash"] = "";
header('location: ../ownerhome.php');
}
 }

?>