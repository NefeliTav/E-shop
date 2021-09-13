<?php
    session_start();
    require_once './connect.php';
    $nameErr = $lastnameErr = $emailErr = $telErr = $postcodeErr = $passwordErr = "";

    if(isset($_POST['submit2']))
	{
		
		$firstname = test_input($_POST["firstname"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) 
		{
			$nameErr = "Only letters and white space allowed\n";
		}
		
		$lastname = test_input($_POST["lastname"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) 
		{
			$lastnameErr = "Only letters and white space allowed\n";
		}
		
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$emailErr = "Invalid email format\n";
		}
		
		$tel = test_input($_POST["tel"]);
		if (!preg_match("/^[0-9]{9,11}$/", $tel)) 
		{
			$telErr = "Invalid phone format\n";
		}
		
		$address = test_input($_POST["address"]);
		
		$postcode = test_input($_POST["postcode"]);
		if (!preg_match("/^[0-9]{5,10}$/", $postcode)) 
		{
			$postcodeErr = "Invalid postcode format\n";
		}
		
		$password = test_input($_POST["password"]);
		$password2 = test_input($_POST["password2"]);
		
		if ($password != $password2) 
		{
			$passwordErr = "The two passwords do not match\n";
		}
		
		//echo $firstname,$lastname,$email,$tel,$address,$postcode,$password;
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

		echo $nameErr,$lastnameErr,$emailErr,$telErr,$postcodeErr,$passwordErr;

		$query = "INSERT INTO users (firstname, lastname, email, tel, addr, postcode, psw) VALUES ('$firstname', '$lastname', '$email', '$tel', '$address', '$postcode', '$passwordHash');";
		$result = mysqli_query($conn,$query);
        if ($result)
        {
			$_SESSION['id']=mysqli_insert_id($conn);
            $_SESSION['firstname']=$firstname;
            $_SESSION['lastname']=$lastname;
            $_SESSION['email']=$email;
            $_SESSION['tel']=$tel;
            $_SESSION['address']=$address;
            $_SESSION['postcode']=$postcode;
            $_SESSION['password']=$password;
        }
		else
		{
			$_SESSION['failure'] = 'Wrong...';
		}
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
		
    }
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>