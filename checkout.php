<?php 
session_start();
require_once './db_operations/connect.php';
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
    <link rel="stylesheet" type="text/css" href="./styling/profile.css">
    <link rel="stylesheet" type="text/css" href="./styling/index.css">
    <link rel="stylesheet" type="text/css" href="./styling/checkout.css">
    <link rel="stylesheet" type="text/css" href="./styling/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="profile.js"></script>
    <script type="text/javascript" src="index.js"></script>


</head>

<body>
<?php
	include './html/header.html';
?>
    <div class="checkoutGrid" >
    <div class="checkoutGridItem">
        <h3>Order Information</h3>
        <p style="font-size:18px; margin-right: 60px;">Fill in the delivery information for your order.</p>
        <div class="containerProfile" >
            <form class="formProfile" method="post" action="">
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="fnameForm" name="firstnameForm" placeholder="<?php echo $_SESSION['firstname']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="lnameForm" name="lastnameForm" placeholder="<?php echo $_SESSION['lastname']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Address</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="addressForm" name="addressForm" placeholder="<?php echo $_SESSION['address']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="email" id="emailForm" name="emailForm" placeholder="<?php echo $_SESSION['email']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Post Code</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="postcodeForm" name="postcodeForm" placeholder="<?php echo $_SESSION['postcode']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Phone Number</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="phoneForm" name="phoneForm" placeholder="<?php echo $_SESSION['tel']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="card">Credit Card</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="cardForm" name="cardForm" placeholder="Enter your Card Number">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="terms">Terms and Conditions</label>
                    </div>
                    <div style="padding-top: 0px; padding-bottom: 10px;" class="col-75Profile">
                        <label class="checkboxContainer" for="terms">
                            <a href="./documents/terms-and-conditions.pdf" target="_blank" rel="noopener noreferrer"> I
                                have read and accept the Terms and Conditions</a>
                            <input type="checkbox" id="terms" name="terms" <?php /*if($_SESSION['terms']==1){echo 'checked="checked"' ;}*/ ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="newsletter">Newsletter</label>
                    </div>
                    <div style="padding-top: 0px; padding-bottom: 10px;" class="col-75Profile">
                        <label class="checkboxContainer" for="newsletter">
                            <p> I want to be notified regarding new offers and sales.</p>
                            <input type="checkbox" id="newsletter" name="newsletter" <?php /*if($_SESSION['newsletter']==1){echo 'checked="checked"' ;} */?>>
                            <span class="checkmark"></span>
                        </label>

                    </div>
                </div>
                <div class="rowProfile">
                    <button style="float: right; margin-top:5px;" type="submit" class="buttonAB" name="update">Update Profile</button>
                    <button style="float: left; margin-top:5px; " type="submit" class="buttonAB">Change Password</button>
                </div>
            </form>
        </div>
        </div>
        <div class="checkoutGridItem">
        <div class="cartGrid">
        <?php
        require_once './db_operations/connect.php';
        $query = "SELECT * FROM (SELECT id, image, name, price FROM products where id in (select id from cart where userId= " . $_SESSION['id'] . " )) t1 INNER JOIN (SELECT id, amount FROM cart WHERE userId= " . $_SESSION['id'] . " ) t2 ON t1.id = t2.id";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="cartGridItem">
                <div class="card" style="width:50vw;">
                    <div class="lineGrid" style="position:relative; top:10px;" >
                        <img class="productPhoto" src='<?php echo $row[1]; ?>' alt='<?php echo $row[2]; ?>' style="width:80px; max-height: 80px; position:relative; top:10px;">

                        <div class="lineGridItem" >
                            <p class="cartText" style="font-size:17px;"><?php echo $row[2]; ?></p>
                        </div>
                        <div class="lineGridItem">
                            <p class="price" style="font-size:17px;"><?php echo $row[3]; ?>$</p>
                        </div>
                        <div class="lineGridItem">
                            <p class="cartText" style="font-size:17px;">Amount: <?php echo $row[5]; ?></p>
                        </div>
                        <div class="lineGridItem">
                            <p class="cartText" style="font-size:17px;">Total: <?php echo $row[5] * $row[3]; ?></p>
                        </div>
                        <div class="lineGridItem" style="font-size:17px;">
                        </div>
                    </div>
                    <a href="#" style="position:relative; left:90%; top:-65px; font-size:18px;">Remove</a>
                </div>
            </div>
        <?php }
        ?>
    </div>
        </div>
        </div>
         

    <?php include('./html/footer.html'); ?>

</body>

</html>