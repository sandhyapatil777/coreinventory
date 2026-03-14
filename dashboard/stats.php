<?php

include("../config/database.php");

$totalProducts = $conn->query("SELECT COUNT(*) as total FROM products")
                      ->fetch_assoc()['total'];

$lowStock = $conn->query("SELECT COUNT(*) as total FROM products WHERE stock < 10")
                 ->fetch_assoc()['total'];

$outStock = $conn->query("SELECT COUNT(*) as total FROM products WHERE stock = 0")
                 ->fetch_assoc()['total'];

echo json_encode([
    "total_products"=>$totalProducts,
    "low_stock"=>$lowStock,
    "out_of_stock"=>$outStock
]);

?>