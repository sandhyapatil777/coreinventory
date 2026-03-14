<?php

session_start();

include("../config/database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$loginid = $_POST['loginid'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE loginid='$loginid'";

$result = $conn->query($sql);

if($result->num_rows > 0){

$user = $result->fetch_assoc();

if(password_verify($password,$user['password'])){

$_SESSION['user_id'] = $user['id'];
$_SESSION['loginid'] = $user['loginid'];

header("Location: ../dashboard/dashboard.html");
exit();

}else{

echo "Wrong password";

}

}else{

echo "User not found";

}

}

?>