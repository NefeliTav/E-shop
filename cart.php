<?php
session_start();
require_once 'connect.php';

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
    <!-- responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- link to css -->
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="compare.css">
    <link rel="stylesheet" type="text/css" href="cart.css">
    <!-- social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- search bar -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>


    <!-- js functions -->
    <script type="text/javascript" src="index.js"></script>

</head>

<body>
<div class="header">
        <a href="./index.php"><img src="./images/logo.jpg" class="logo"></a>
        <div class="topnav" id="topnav">
            <a href="./index.php">Home</a>
            <a href="./index.php#products">Products</a>
            <a href="./index.php#about">About</a>
            <a href="./index.php#contact">Contact</a>

            <a href="#" class="icon" onclick="openSideNav();return false;">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="search-box">
            <form>
                <input type="text" class="txt" placeholder="Search Here...">
                <a class="btn"><i class="fa fa-search"></i></a>
            </form>
        </div>

        <a href="javascript:void(0)" role="button" title="login" id="login" style="color:black;font-size:20px;width:75px;height:45px;"
            class="btn btn-success btn-lg">
            log in
        </a>
        <a href="./profile.php" role="button" title="profile" id="profile" style="color:black;font-size:20px;padding-bottom:3.5rem;position:relative;left:-10px; width:75px"
            class="btn btn-success btn-lg">
            profile
        </a>
        <a href="./disconnect.php" role="button" title="disconnect" id="disconnect" style="color:black;font-size:20px;padding-bottom:3.5rem;width:75px; position:relative;"
            class="btn btn-success btn-lg">
            logout
        </a>
        <a href="./cart.php" id="cart" title="shopping cart" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-shopping-cart" style="color:black;"></span>
        </a>
        <a href="compare.php" id="heart" title="wishlist" class="btn btn-success btn-lg">
            <span style="font-size:18px;background: none;" class="fa">&#xf004;</span>
        </a>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1 style="font-size:30px;text-align:center;">Log in</h1>
                <hr>
                <div class="form-popup">
                    <form action="./login.php" method="post" class="form-container" id="modalForm">
                        <?php if (isset($_SESSION['failure']) and isset($_SESSION['id'])==false) {
                            echo '<script>
                            var modal = document.getElementById("myModal");
                            var btn = document.getElementById("login");
                            var span = document.getElementsByClassName("close")[0];
                            modal.style.display = "block";
                            </script>';
                            }
                        ?>
                        <?php 
                                if (isset($_SESSION['failure']) && ($_SESSION['failure']!="")) {?>
                                    <div class="failure" style="margin-bottom: 10px;font-size: 18px;color: red;"><?php echo $_SESSION['failure']; ?></div>
                            <?php }
                                else if( isset($_SESSION['failure']) && $_SESSION['email']!="")
                                { ?>
                                    <script>
                                        document.getElementById("login").style.display = "none";
                                        document.getElementById("profile").style.display = "block";
                                        document.getElementById("disconnect").style.display = "block";
                                    </script>
                            <?php
                                }else{
                                    ?>
                                    <script>
                                        document.getElementById("login").style.display = "block";
                                        document.getElementById("profile").style.display = "none";
                                    </script>
                            <?php

                            if (isset($_SESSION['email']))
                            {
                                ?>
                                <script>
                                    document.getElementById("login").style.display = "none";
                                    document.getElementById("profile").style.display = "block";
                                    document.getElementById("disconnect").style.display = "block";
                                </script>
                                <?php 
                            }

                                }
                            unset($_SESSION['failure']);
                            
                        ?>
                        <label for="email" style="font-weight:normal;font-size:20px;">Email</label>
                        <input type="text" placeholder="Enter Email" name="email" required>
                        <br>
                        <label for="psw" style="font-weight:normal;font-size:20px;">Password </label>
                        <div>
                            <input type="checkbox" onclick="show_password('myInput')">Show Password
                        </div>

                        <input type="password" id="myInput" placeholder="Enter Password" name="password" required>
                        <br>

                        <button name="submit" type="submit" class="btn">Login</button>

                        <p>Don’t have an account?<br><a style="color:black;" href="##" title="signup"
                                id="signup"><u>Create
                                    account</u></a></p>
                    </form>
                </div>
            </div>

        </div>

        <div id="myModal2" class="modal">
            <div id="modal-content2" class="modal-content">
                <span id="close" class="close">&times;</span>
                <h1 style="font-size:30px;text-align:center;">Sign up</h1>
                <hr>
                <div class="form-popup">
                    <form action="./signup.php" method="post" id="form-container2" class="form-container">

                        <label for="firstname" style="font-weight:normal;font-size:20px;">First Name</label>
                        <label for="lastname" style="margin-left:41%;font-weight:normal;font-size:20px;">Last
                            Name</label>
                        <br>
                        <input type="text" placeholder="Enter first name" name="firstname" required>
                        <input type="text" style="margin-left:20%;" placeholder="Enter last name" name="lastname"
                            required>
                        <br>
                        <label for="email" style="font-weight:normal;font-size:20px;">Email</label>
                        <label for="tel" style="margin-left:48%;font-weight:normal;font-size:20px;">Phone number</label>
                        <br>
                        <input type="email" placeholder="e.g. papadopoulos@gmail.com" name="email" required>
                        <input type="tel" style="margin-left:20%;" placeholder="e.g.6940234783" name="tel" required>
                        <br>
                        <label for="address" style="font-weight:normal;font-size:20px;">Address</label>
                        <label for="postcode"
                            style="margin-left:45%;font-weight:normal;font-size:20px;">Postcode</label>
                        <br>
                        <input type="text" placeholder="Enter Address" name="address" required>
                        <input type="text" style="margin-left:20%;" placeholder="Enter Postcode" name="postcode"
                            required>
                        <br>
                        <div class="password-field">
                            <label for="password" style="font-weight:normal;font-size:20px;">Password</label>
                            <label for="password"
                                style="margin-left:44%;font-weight:normal;font-size:20px;">Confirm</label>
                            <br>
                            <input id="myInput1" class="password-field" type="password" placeholder="Enter Password"
                                name="password" required />
                            <input type="password" style="margin-left:20%;" id="myInput2" placeholder="Confirm Password"
                                onkeyup='check_match();' name="password2" required>
                        </div>
                        <span id='message'></span>


                        <input type="checkbox"
                            style="margin-left: 60%;padding: 0 7em 2em 0;font-size:10px;width:15px;height:15px;"
                            onclick="show_password('myInput1', 'myInput2')">
                        Show Password
                        <br>
                        <input type="checkbox" style="font-size:20px;width:20px;height:20px;" required> I have read and
                        i agree to the
                        Terms &
                        Conditions
                        <br>
                        <button style="padding:10px;" type="submit" name="submit2" class="btn">Sign up</button><br>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="cartGrid">
        <?php
        require_once 'connect.php';
        if(isset($_SESSION['id'])){
        $query = "SELECT * FROM (SELECT id, image, name, price FROM products where id in (select id from cart where idUsr= " . $_SESSION['id'] . " )) t1 INNER JOIN (SELECT id, amount FROM cart WHERE idUsr= " . $_SESSION['id'] . " ) t2 ON t1.id = t2.id";
        $result = mysqli_query($conn, $query);}else{
            $result=NULL;
        }
        if(isset($_SESSION['id'])){
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="cartGridItem">
                <div class="card">
                    <div class="lineGrid">
                        <img class="productPhoto" src='<?php echo $row[1]; ?>' alt='<?php echo $row[2]; ?>' style="width:120px; max-height: 120px;">

                        <div class="lineGridItem" >
                            <p style="font-size=5px;" class="cartText"><?php echo $row[2]; ?></p>
                        </div>
                        <div class="lineGridItem">
                            <p class="price"><?php echo $row[3]; ?>$</p>
                        </div>
                        <div class="lineGridItem">
                            <p class="cartText">Amount: <?php echo $row[5]; ?></p>
                        </div>
                        <div class="lineGridItem">
                            <p class="cartText">Total: <?php echo $row[5] * $row[3]; ?></p>
                        </div>
                        <div class="lineGridItem">
                        </div>
                    </div>
                    <a href="#" style="position:relative; left:90%; top:-65px; font-size:25px;">Remove</a>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <input onclick="location.href='./checkout.php';" style="position:relative; left:80%; margin-top:50px; margin-left:6.3vw; font-size:25px;" type="button" class="buttonAB" value="Checkout">
    <?php }
        ?>





    <br>
    <br>
    <br>
    <!-- The overlay -->
    <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <a href="#home" onclick=" closeSideNav()">Home</a>
            <a href=" #products" onclick="closeSideNav()">Products</a>
            <a href="#about" onclick="closeSideNav()">About</a>
            <a href="#contact" onclick="closeSideNav()">Contact</a>

        </div>

    </div>
    <hr> <!-- thematic break -->
    <div class=" footer">
        <a href="https://www.facebook.com/" title="facebook" class="fa fa-facebook"></a>
        <a href="https://twitter.com/" title="twitter" class="fa fa-twitter"></a>
        <a href="https://www.instagram.com/" title="instagram" class="fa fa-instagram"></a>
        <br>
        <a href="" style="color:black">Privacy Policy</a>
        |
        <a href="./documents/terms-and-conditions.pdf" style="color:black">Terms of Use</a>
        <br>
        <br>
        <p style="font-size:15px;">&copy; 2021 G&N , All rights reserved</p>


    </div>


</body>

</html>