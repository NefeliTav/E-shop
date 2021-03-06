<?php
    require_once 'connect.php';
	session_start();

    if(isset($_POST['submit']))
    {
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
        $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' and psw='$passwordHash'");
    
        if ($result)
        {
            /*
            $arr = $result->fetch_array();
            $_SESSION['firstname']=$arr[0];
            $_SESSION['lastname']=$arr[1];
            $_SESSION['email']=$arr[2];
            $_SESSION['tel']=$arr[3];
            $_SESSION['address']=$arr[4];
            $_SESSION['postcode']=$arr[5];
            $_SESSION['password']=$arr[6];
            header('Location: index.php');
            mysqli_close($conn);*/
        }
        else
        {
            $_SESSION['failure'] = 'Wrong username or password.';
        }
    }
   
?>
   