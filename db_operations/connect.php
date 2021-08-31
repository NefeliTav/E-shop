<?php    
    $serverName='db';
	$username='root';
	$password='';
	$database='e-shop';
	$conn = mysqli_connect("localhost",$username,$password,$database);
	if ($conn->connect_error) 
        die($conn->connect_error);
?>
    