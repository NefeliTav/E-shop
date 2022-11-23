<?php    
    $serverName='eshop-db';
	$username='root';
	$password='root';
	$database='test_db';
	$port=3306;
	$conn = mysqli_connect($serverName,$username,$password,$database,$port);
	if ($conn->connect_error) 
        die($conn->connect_error);
?>
    