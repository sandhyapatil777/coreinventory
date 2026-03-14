<?php

include("../config/database.php");

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$unit = $_POST['unit'];

$sql = "UPDATE products
        SET name='$name',
        category='$category',
        unit='$unit'
        WHERE id=$id";

if($conn->query($sql)){
    echo json_encode(["message"=>"Product updated"]);
}else{
    echo json_encode(["error"=>$conn->error]);
}

?>