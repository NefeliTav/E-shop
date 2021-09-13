<?php 
require_once './db_operations/connect.php';
session_start();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="./javascript/profile.js"></script>
    <script type="text/javascript" src="./javascript/index.js"></script>


</head>

<body>
<?php
	include './html/header.html';
?>
    <div class="tab" style="margin-top:30px;">
        <button class="tablinks active" onclick="Tab(event, 'Personal Information')">Personal Information</button>
        <button class="tablinks" onclick="Tab(event, 'Orders')">Orders</button>
        <button class="tablinks" onclick="Tab(event, 'Reviews')">Reviews</button>
    </div>
    <!--Profile Menu Bar-->
    <div style="display: block" id="Personal Information" class="tabcontent">
        <h3>Personal Information</h3>
        <p style="font-size:18px; margin-right: 60px;">Here you can update your personal information.</p>
        <div class="containerProfile" style="margin-bottom:70px;">
            <form class="formProfile" method="post" action="./db_operations/update.php">
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="fnameForm" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" placeholder="<?php echo $_SESSION['firstname']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="lnameForm" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" placeholder="<?php echo $_SESSION['lastname']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Address</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="addressForm" name="address" value="<?php echo $_SESSION['address']; ?>" placeholder="<?php echo $_SESSION['address']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="email" id="emailForm" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="<?php echo $_SESSION['email']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Post Code</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="postcodeForm" name="postcode" value="<?php echo $_SESSION['postcode']; ?>" placeholder="<?php echo $_SESSION['postcode']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <div class="col-25Profile">
                        <label for="lname">Phone Number</label>
                    </div>
                    <div class="col-75Profile">
                        <input type="text" id="phoneForm" name="tel" value="<?php echo $_SESSION['tel']; ?>" placeholder="<?php echo $_SESSION['tel']; ?>">
                    </div>
                </div>
                <div class="rowProfile">
                    <button style="float: right; margin-top:5px;" type="submit" class="buttonAB" name="submit3">Update Profile</button>
                </div>
            </form>
        </div>

    </div>

    <div id="Orders" class="tabcontent" style="align-items:center;margin-bottom:70px;">
        <h3>Orders</h3>
        <p style="font-size:18px; margin-right: 60px;">Here you can review information regarding your pending
            and completed orders.</p>
        <table class="profileTable">
            <tr>
                <th>Product</th>
                <th>Product Code</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Date Ordered</th>
                <th>Status</th>
            </tr>
        </table>
    </div>

    <div id="Reviews" class="tabcontent" style="align-items:center;margin-bottom:70px;">
        <h3>Reviews</h3>
        <p style="font-size:18px; margin-right: 60px;">Here you can view, delete and modify the reviews you
            have submitted for the products you own.</p>
        <table class="profileTable">
            <tr>
                <th>Product</th>
                <th>Product Code</th>
                <th>Date Ordered</th>
                <th>Date Delivered</th>
                <th>Review Score</th>
                <th>Review Text</th>
            </tr>
        </table>
    </div>

  

    <?php include('./html/footer.html'); ?>

</body>

</html>