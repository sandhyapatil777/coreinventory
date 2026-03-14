<?php

include("../config/database.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$token = bin2hex(random_bytes(16));

$sql = "INSERT INTO users(name,email,password,verification_token,verified)
VALUES('$name','$email','$password','$token',0)";

if($conn->query($sql)){

$verify_link = "http://localhost/coreinventory/auth/verify.php?token=".$token;

$subject = "Email Verification";
$message = "Click the link to verify your email: ".$verify_link;

mail($email,$subject,$message);

echo json_encode([
"status"=>"success",
"message"=>"Registration successful. Check email to verify."
]);

}else{

echo json_encode([
"status"=>"error",
"message"=>"Registration failed"
]);

}

?>