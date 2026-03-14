<?php

include "database.php";

$receipt_id=$_POST['receipt_id'];
$supplier=$_POST['supplier'];
$product=$_POST['product'];
$qty=$_POST['qty'];
$warehouse=$_POST['warehouse'];
$status=$_POST['status'];

$sql="INSERT INTO receipts 
(receipt_id,supplier,product,quantity,warehouse,status)
VALUES
('$receipt_id','$supplier','$product','$qty','$warehouse','$status')";

if(mysqli_query($conn,$sql)){
echo json_encode(["status"=>"success"]);
}else{
echo json_encode(["status"=>"error"]);
}

?>