<?php
    require_once 'connect.php';

	$emailErr = "";

    if(isset($_POST['submit3']))
	{
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$emailErr = "Invalid email format\n";
		}
		$text = $_POST["text"];

        if(isset($_POST['checkbox']))
	    {
            $checkbox = 1;
        }
		
		echo $emailErr;

		$query = "INSERT INTO messages (email,text,newsletter) VALUES ('$email','$text','$checkbox')";
		$result = mysqli_query($conn,$query);
        if ($result)
        {
            header('Location: index.php');
			mysqli_close($conn);
        }
		else
		{
			echo 'Failed';
			header('Location: index.php');
			mysqli_close($conn);
		}
		
    }
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>