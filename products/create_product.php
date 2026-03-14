<?php

include("../config/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name = $_POST['name'] ?? '';
$sku = $_POST['sku'] ?? '';
$category = $_POST['category'] ?? '';
$unit = $_POST['unit'] ?? '';
$stock = $_POST['stock'] ?? 0;

$sql = "INSERT INTO products(name,sku,category,unit,stock)
VALUES('$name','$sku','$category','$unit','$stock')";

if($conn->query($sql)){
    echo json_encode([
        "status"=>"success",
        "message"=>"Product created"
    ]);
}else{
    echo json_encode([
        "status"=>"error",
        "message"=>$conn->error
    ]);
}

}else{

echo json_encode([
"message"=>"Use POST request"
]);

}

?>