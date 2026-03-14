<?php

include("../config/database.php");

$product=$_POST['product_id'];
$new=$_POST['new_stock'];
$reason=$_POST['reason'];

$res=$conn->query("SELECT stock FROM products WHERE id=$product");
$row=$res->fetch_assoc();

$prev=$row['stock'];

$conn->query("INSERT INTO adjustments(product_id,previous_stock,new_stock,reason)
VALUES('$product','$prev','$new','$reason')");

$conn->query("UPDATE products SET stock=$new WHERE id=$product");

$conn->query("INSERT INTO ledger(product_id,type,quantity,note)
VALUES('$product','adjustment','$new','stock correction')");

echo json_encode(["message"=>"stock adjusted"]);

?>