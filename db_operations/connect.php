<?php    
    $hn='db';
	$un='devuser';
	$pw='devpass';
	$db='test_db';
	$conn = mysqli_connect($hn,$un,$pw,$db);
	if ($conn->connect_error) 
        die($conn->connect_error);
?>
    