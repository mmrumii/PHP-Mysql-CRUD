<?php

$connection = mysqli_connect('127.0.0.1', 'root', 'Letmein123!', 'mailserver');

if(!$connection){echo "Database Connection Failed";}
else{ echo "Database Connection Successful \n";}


$user_id = $_POST["user_id"];


$sql = "DELETE FROM virtual_users WHERE id = '$user_id'";
$connection->query($sql);


echo "User Deleted";

header("Location: index.php");

mysqli_close($connection);


?>
