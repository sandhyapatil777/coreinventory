<?php

include("../config/database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$product_id = $_POST['product_id'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$customer = $_POST['customer'] ?? '';

if($product_id=='' || $quantity==''){
    echo json_encode([
        "status"=>"error",
        "message"=>"product_id and quantity required"
    ]);
    exit;
}

$conn->query("INSERT INTO deliveries(customer,product_id,quantity)
VALUES('$customer','$product_id','$quantity')");

$conn->query("UPDATE products
SET stock = stock - $quantity
WHERE id=$product_id");

echo json_encode([
"status"=>"success",
"message"=>"Stock reduced"
]);

}else{

echo json_encode([
"message"=>"Use POST request"
]);

}

?>