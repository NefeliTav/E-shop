

<?php
    require_once 'connect.php';
	session_start();

    $email = ($_POST['email']);
    $password = ($_POST['password']);

    $result = mysqli_query("SELECT * FROM login WHERE email='$email' and password='$password'");

    if ($result)
    {
        $arr = $result->fetch_array();
        if(empty($arr[0]))
        {
            echo 'Wrong Username or Password! Return to <a href="index.html">login</a>';
            exit();
        }
        echo 'Success!';
        $_SESSION['firstname']=$arr[0];
        $_SESSION['lastname']=$arr[1];
        $_SESSION['email']=$arr[4];
        $_SESSION['tel']=$arr[5];
        $_SESSION['address']=$arr[6];
        $_SESSION['postcode']=$name;
        $_SESSION['password']=$arr[7];
        $conn->close();
    }

?>
   