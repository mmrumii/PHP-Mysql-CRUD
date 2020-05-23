<?php

$connection = mysqli_connect('127.0.0.1', 'root', 'Letmein123!', 'mailserver');

if(!$connection){echo "Database Connection Failed";}
else{ echo "Database Connection Successful \n";}


$domain_id = $_POST["domain_id"];


$sql = "DELETE FROM virtual_domains WHERE id = '$domain_id'";
$connection->query($sql);


echo "Domain Deleted";

header("Location: domain.php");

mysqli_close($connection);


?>
