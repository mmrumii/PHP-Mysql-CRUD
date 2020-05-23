<?php

$connection = mysqli_connect('127.0.0.1', 'root', 'Letmein123!', 'mailserver');

if(!$connection){echo "Database Connection Failed";}
else{ echo "Database Connection Successful \n";}


$domain = $_POST['domain'];
$email = $_POST['email'];
$password = $_POST['password'];

echo $domain;
echo $email;
echo $password;


$hashed_password = hash("sha256", $password);

$sql = "INSERT INTO virtual_users (domain_id, password, email) VALUES ('$domain', '$hashed_password', '$email');";
$connection->query($sql);


echo 'Successfully added';

header("Location: index.php");






mysqli_close($connection);



?>
