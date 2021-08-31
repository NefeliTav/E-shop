<?php
session_start();
require_once './db_operations/connect.php';

if (isset($_POST['submit'])) {
    $_SESSION['failure'] = "";
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if ($result) {

        if (password_verify($password, $passwordHash)) {
            $arr = $result->fetch_array();
            if ($arr) {
                /*$_SESSION['id']=$arr[0];*/
                $_SESSION['firstname'] = $arr[0];
                $_SESSION['lastname'] = $arr[1];
                $_SESSION['email'] = $arr[2];
                $_SESSION['tel'] = $arr[3];
                $_SESSION['address'] = $arr[4];
                $_SESSION['postcode'] = $arr[5];
                $_SESSION['password'] = $arr[6];
            } else {
                $_SESSION['failure'] = 'Wrong username or password.';
            }
        }
    } else {
        $_SESSION['failure'] = 'Wrong username or password.';
    }
}

$nameErr = $lastnameErr = $emailErr = $telErr = $postcodeErr = $passwordErr = "";

if (isset($_POST['submit2'])) {

    $firstname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
        $nameErr = "Only letters and white space allowed\n";
    }

    $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
        $lastnameErr = "Only letters and white space allowed\n";
    }

    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format\n";
    }

    $tel = test_input($_POST["tel"]);
    if (!preg_match("/^[0-9]{9,11}$/", $tel)) {
        $telErr = "Invalid phone format\n";
    }

    $address = test_input($_POST["address"]);

    $postcode = test_input($_POST["postcode"]);
    if (!preg_match("/^[0-9]{5,10}$/", $postcode)) {
        $postcodeErr = "Invalid postcode format\n";
    }

    $password = test_input($_POST["password"]);
    $password2 = test_input($_POST["password2"]);

    if ($password != $password2) {
        $passwordErr = "The two passwords do not match\n";
    }

    //echo $firstname,$lastname,$email,$tel,$address,$postcode,$password;
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    echo $nameErr, $lastnameErr, $emailErr, $telErr, $postcodeErr, $passwordErr;

    $query = "INSERT INTO users (firstname, lastname, email, tel, addr, postcode, psw) VALUES ('$firstname', '$lastname', '$email', '$tel', '$address', '$postcode', '$passwordHash')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        /*$_SESSION['id']=$arr[0];*/
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['tel'] = $tel;
        $_SESSION['address'] = $address;
        $_SESSION['postcode'] = $postcode;
        $_SESSION['password'] = $password;
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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./styling/index.css">
    <link rel="stylesheet" type="text/css" href="./styling/compare.css">
    <link rel="stylesheet" type="text/css" href="./styling/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="javascript/index.js"></script>

</head>

<body>
<?php
	include './html/header.html';
?>
    <div class="cartGrid">
        <?php
        require_once './db_operations/connect.php';
        if(isset($_SESSION['id']))
        {
            $query = "SELECT * FROM (SELECT id, image, name, price FROM products where id in (select id from cart where userId= " . $_SESSION['id'] . " )) t1 INNER JOIN (SELECT id FROM cart WHERE userId= " . $_SESSION['id'] . " ) t2 ON t1.id = t2.id";
            $result = mysqli_query($conn, $query);
        }
        else
        {
            $result=NULL;
        }
        if(isset($_SESSION['id'])){
        
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="cartGridItem"
            >
                <div class="card">
                    <div class="lineGrid">
                        <img class="productPhoto" src='<?php echo $row[1]; ?>' alt='<?php echo $row[2]; ?>' style="width:120px; max-height: 120px;">

                        <div class="lineGridItem" >
                            <p style="font-size=5px;" class="cartText"><?php echo $row[2]; ?></p>
                        </div>
                        <div class="lineGridItem">
                            <p class="price"><?php echo $row[3]; ?>$</p>
                        </div>
                    </div>
                    <form method="post">
                        <button style="position:relative; left:70%; top:-65px; weight:7px;font-size:20px;" class="buttonAB">Purchase</button>
                        <button type="submit" id="<?php echo $row[0]; ?>" name="<?php echo $row[0]; ?>" style="position:relative; left:80%; top:-65px; weight:7px;font-size:20px;" class="buttonAB">Remove</button>
                        <?php
                            if (isset($_POST[$row[0]])) 
                            {
                                $query = mysqli_query($conn,"DELETE FROM cart WHERE userId={$_SESSION['id']} and id={$row[0]}");
                            }
                            unset($_POST[$row[0]]);
                        ?>
                    </form>

                </div>
            </div>
        <?php }
        ?>
    </div>
    <input onclick="location.href='./checkout.php';" style="position:relative; left:80%; margin-top:50px; margin-left:6.3vw; font-size:25px;" type="button" class="buttonAB" value="Checkout">
    <?php }
        ?>




    
    <?php include('./html/footer.html'); ?>


</body>

</html>