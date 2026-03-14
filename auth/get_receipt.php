<?php

include "database.php";

$sql="SELECT * FROM receipts ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

$data=[];

while($row=mysqli_fetch_assoc($result)){
$data[]=$row;
}

echo json_encode($data);

?>