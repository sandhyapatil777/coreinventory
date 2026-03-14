<?php

include("../config/database.php");

if(isset($_GET['token'])){

$token = $_GET['token'];

$sql = "SELECT * FROM users WHERE verification_token='$token'";
$result = $conn->query($sql);

if($result->num_rows > 0){

$conn->query("UPDATE users SET verified=1 WHERE verification_token='$token'");

header("Location: http://localhost/coreinventory/dashboard.html");
exit();

}else{

echo "Invalid verification link.";

}

}else{

echo "Token missing.";

}

?>