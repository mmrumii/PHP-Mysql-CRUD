<?php 

$connection = mysqli_connect('127.0.0.1', 'root', 'Letmein123!', 'mailserver');

if(!$connection){echo "Database Connection Failed";}
else{ echo "Database Connection Successful \n";}


$domain = $_POST['domain'];


echo $domain_name;


$sql = "INSERT INTO virtual_domains (name) VALUES ('$domain');";
$connection->query($sql);	

echo 'Successfully added';				
			
header("Location: domain.php"); 

			
mysqli_close($connection)
?>
						
	