<?php 
include "connection.php";
session_start();
if(isset($_POST["product_name"]) && $_POST["product_name"] != "" && strlen($_POST["product_name"]) >= 3) {
    $item_name = $_POST["product_name"];
}else{
    die ("Enter a valid input1");
}

if(isset($_POST["description"]) && $_POST["description"] != "" && strlen($_POST["description"]) >= 3) {
 $description = $_POST["description"];
}else{
    die ("Enter a valid input1");
}

if(isset($_POST["category"]) && $_POST["category"] != "" && strlen($_POST["category"]) >= 3) {
    $category = $_POST["category"];
}else{
    die ("Enter a valid input2");
}

if(isset($_POST["quatity"]) && $_POST["quatity"] !="") {
    $quatity = $_POST["quatity"];
}else{
    die ("Enter a valid input3");
}

if(isset($_POST["price"]) && $_POST["price"] != "") {
    $price = $_POST["price"];
}else{
    die ("Enter a valid input4");
}

if(empty($_SESSION["id"])){
    header('location: login.php');
  }
if($_SESSION["type"]==0){
    header('location: customerhome.php');
  }

$img_file="../images/".$_FILES['img_file']['name'];
$img_file2="images/".$_FILES['img_file']['name'];
move_uploaded_file( $_FILES["img_file"]["tmp_name"], $img_file);
 if ( true)
 {
 	
$sql2 = "INSERT INTO `items` (`name`, `quantity`, `shop_id`, `price`, `image_path`, `category`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?);";
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("siiisss",$item_name,$quatity,$_SESSION["shopid"],$price,$img_file2,$category,$description);
$stmt2->execute();
$result2 = $stmt2->get_result();
$_SESSION["flash"] = "";
header('location: ../ownerhome.php');

}


?>