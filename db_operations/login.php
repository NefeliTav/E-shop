<?php
    session_start();
    require_once './connect.php';

    if(isset($_POST['submit']))
    {
        $_SESSION['failure'] ="";
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
        $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    
        if ($result)
        {

            if(password_verify($password,$passwordHash)) 
            {
                $arr = $result->fetch_array();
                if ($arr)
                {
                    $_SESSION['id']=$arr[0];
                    $_SESSION['firstname']=$arr[1];
                    $_SESSION['lastname']=$arr[2];
                    $_SESSION['email']=$arr[3];
                    $_SESSION['tel']=$arr[4];
                    $_SESSION['address']=$arr[5];
                    $_SESSION['postcode']=$arr[6];
                    $_SESSION['password']=$arr[7];
                    $referer = $_SERVER['HTTP_REFERER'];
                    header("Location: $referer");
                }
                else
                {
                    $_SESSION['failure'] = 'Wrong username or password.';
                    $referer = $_SERVER['HTTP_REFERER'];
                    header("Location: $referer");
                }
            } 
        }
        else
        {
            $_SESSION['failure'] = 'Wrong username or password.';
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }
?>