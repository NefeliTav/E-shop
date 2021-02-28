<?php    
    $hn='localhost';
	$db='e-shop';
	$un='root';
	$pw='';
	$conn = new mysqli_connect($hn,$un,$pw,$db);
	if ($conn->connect_error) 
        die($conn->connect_error);
?>
    