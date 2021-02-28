

<?php
    require_once 'connect.php';
	session_start();

    if(isset($_POST['submit']))
	{
		if (empty($_POST["firstname"])) 
		{
			$nameErr = "Name is required";
		} 
		else 
		{
			$name = test_input($_POST["firstname"]);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
			{
			  $nameErr = "Only letters and white space allowed";
			}
		}
		if (empty($_POST["lastname"])) 
		{
			$lastnameErr = "Last Name is required";
		} 
		else 
		{
			$lastname = test_input($_POST["lastname"]);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) 
			{
			  $lastnameErr = "Only letters and white space allowed";
			}
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		}
		else 
		{
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
			  $emailErr = "Invalid email format";
			}
		}
		if (empty($_POST["tel"])) {
			$emailErr = "Phone is required";
		}
		else 
		{
			$tel = test_input($_POST["tel"]);
			if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $tel)) 
			{
			  $telErr = "Invalid phone format";
			}
		}
		if (empty($_POST["address"])) {
			$addressErr = "Address is required";
		}
		else 
		{
			$address = test_input($_POST["address"]);
		}
		if (empty($_POST["postcode"])) {
			$postcodeErr = "Postcode is required";
		}
		else 
		{
			$postcode = test_input($_POST["postcode"]);
			if (!preg_match("/^[0-9]$/", $postcode)) 
			{
			  $postcodeErr = "Invalid postcode format";
			}
		}
		if (empty($_POST["password"])) {
			$passwordErr = "Password is required";
		}
		else 
		{
			$password = test_input($_POST["password"]);
		}
		if (empty($_POST["password2"])) {
			$password2Err = "Password is required";
		}
		else 
		{
			$password2 = test_input($_POST["password2"]);
		}
		if (isset($_POST["checkbox"]))
		{ 
			$checkbox = $_POST['checkbox'];
		}
		else
		{
    		$checkbox = 0;
		}
		if ($password != $password2) 
		{
			$passwordErr = "The two passwords do not match";
		}
		
    }
?>
	/*
	if(password_verify($_POST['password'], '$2y$10$sejeRNYZGaoPh1EwfcuO1.hxl/uepQOh9SITWWgeej86vnMt26KIa')){
		header("Location: http://localhost");
		$_SESSION['login'] = true;
	}
	*/
