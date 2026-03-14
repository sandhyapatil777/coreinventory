<?php

include("../config/database.php");

$product_id = $_POST['product_id'];
$from_location = $_POST['from_location'];
$to_location = $_POST['to_location'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO transfers(product_id,from_location,to_location,quantity)
        VALUES('$product_id','$from_location','$to_location','$quantity')";

if($conn->query($sql)){
    echo json_encode(["message"=>"Transfer recorded"]);
}else{
    echo json_encode(["error"=>$conn->error]);
}

?>