<?php 
ob_start();
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
    <div class="checkoutGrid" style="margin-bottom:70px;">
    <div class="checkoutGridItem">
        <h3>Order Information</h3>
        <p style="font-size:18px; margin-right: 60px;">Fill in the delivery information for your order.</p>
        <div class="containerProfile" >
            <form class="formProfile" method="post" action="./db_operations/update.php" >
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" placeholder="<?php echo $_SESSION['firstname']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" placeholder="<?php echo $_SESSION['lastname']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Address</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="address" name="address" value="<?php echo $_SESSION['address'];?>" placeholder="<?php echo $_SESSION['address']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="email" id="email" name="email"  value="<?php echo $_SESSION['email']; ?>" placeholder="<?php echo $_SESSION['email']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Post Code</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="postcode" name="postcode" value="<?php echo $_SESSION['postcode']; ?>" placeholder="<?php echo $_SESSION['postcode']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Phone Number</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="tel" name="tel" value="<?php echo $_SESSION['tel']; ?>" placeholder="<?php echo $_SESSION['tel']; ?>">
                    </div>
                </div>
            
                <div class="rowProfile">
                    <button style="float: right; margin-top:5px;" name="submit3" type="submit" class="buttonAB" >Update Profile</button>
                </div>
            </form>
        </div>
        </div>
        <div class="checkoutGridItem">
        <div class="cartGrid" style="margin-bottom:80px;">
        <?php
        require_once './db_operations/connect.php';
        $query = "SELECT * FROM (SELECT id, image, name, price FROM products where id in (select id from cart where userId= " . $_SESSION['id'] . " )) t1 INNER JOIN (SELECT id FROM cart WHERE userId= " . $_SESSION['id'] . " ) t2 ON t1.id = t2.id";
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
                        <div class="lineGridItem" style="font-size:17px;">
                        </div>
                    </div>
                    <form method="post">
                        <button type="submit" id="<?php echo $row[0] ?>" name="<?php echo $row[0] ?>" style="position:relative; left:80%; top:-50px; font-size:18px;"  class="buttonAB">Remove</button>
                        <?php
                                if (isset($_POST[$row[0]])) 
                                {
                                    $query = mysqli_query($conn,"DELETE FROM cart WHERE userId={$_SESSION['id']} and id={$row[0]} LIMIT 1");
                                    unset($_POST[$row[0]]);
                                    header("Refresh:0");
                                }
                        ?>
                    </form>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <button style="float: right;margin-right:100px; margin-top:200px;" name="submit3" type="submit" class="buttonAB" >Buy</button>

        </div>
        </div>
         

    <?php include('./html/footer.html'); ?>

</body>

</html>