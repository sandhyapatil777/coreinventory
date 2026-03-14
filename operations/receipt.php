<?php

include("../config/database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$product_id = $_POST['product_id'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$supplier = $_POST['supplier'] ?? '';

if($product_id=='' || $quantity==''){
    
    echo json_encode([
        "status"=>"error",
        "message"=>"Missing product_id or quantity"
    ]);
    exit;
}

$conn->query("INSERT INTO receipts(supplier,product_id,quantity)
VALUES('$supplier','$product_id','$quantity')");

$conn->query("UPDATE products 
SET stock = stock + $quantity
WHERE id=$product_id");

echo json_encode([
"status"=>"success",
"message"=>"Stock increased"
]);

}else{

echo json_encode([
"message"=>"Use POST request"
]);

}

?>