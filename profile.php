<?php 
require_once 'connect.php';
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
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="index.css">
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
    <div class="header">
        <a href="./index.php"><img src="./images/logo.jpg" class="logo"></a>
        <div class="topnav" id="topnav">
            <a class="active" href="./index.php">Home</a>
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
        <a href="./ds.php" role="button" title="ds" id="ds" style="color:black;font-size:20px;padding-bottom:3.5rem;width:75px; position:relative;"
            class="btn btn-success btn-lg">
            logout
        </a>
        <a href="" id="cart" title="shopping cart" class="btn btn-success btn-lg">
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

                    <form action="./login.php" method="post" class="form-container">
                        <?php 
                                if (isset($_SESSION['failure']) && ($_SESSION['failure']!="")) {?>
                                    <div class="failure" style="margin-bottom: 10px;font-size: 18px;color: red;"><?php echo $_SESSION['failure']; ?></div>
                            <?php }
                                else if( isset($_SESSION['failure']) && $_SESSION['email']!="")
                                { ?>
                                    <script>
                                        document.getElementById("login").style.display = "none";
                                        document.getElementById("profile").style.display = "block";
                                        document.getElementById("ds").style.display = "block";
                                    </script>
                            <?php
                                }else{
                                    ?>
                                    <script>
                                        document.getElementById("login").style.display = "block";
                                        document.getElementById("profile").style.display = "none";
                                        document.getElementById("ds").style.display = "ds";
                                    </script>
                            <?php

                            if (isset($_SESSION['email']))
                            {
                                ?>
                                <script>
                                    document.getElementById("login").style.display = "none";
                                    document.getElementById("profile").style.display = "block";
                                    document.getElementById("ds").style.display = "block";
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
                        <input style="width:20px;height:20px;margin-left: 15em;padding: 0 7em 2em 0;" type="checkbox"
                            onclick="show_password('myInput')">
                        Show Password

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
    <div class="tab" style="margin-top:30px;">
        <button class="tablinks active" onclick="Tab(event, 'Personal Information')">Personal Information</button>
        <button class="tablinks" onclick="Tab(event, 'Orders')">Orders</button>
        <button class="tablinks" onclick="Tab(event, 'Reviews')">Reviews</button>
    </div>
    <!--Profile Menu Bar-->
    <div style="display: block" id="Personal Information" class="tabcontent">
        <h3>Personal Information</h3>
        <p style="font-size:18px; margin-right: 60px;">Here you can update your personal information, review
            our privacy policy and more.</p>
        <div class="containerProfile">
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

    <div id="Orders" class="tabcontent" style="align-items:center;">
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
            <tr>
                <td>CAMERA_NAME</td>
                <td>#123456789</td>
                <td>200$</td>
                <td>1</td>
                <td>26/2/2021</td>
                <td>Delivered</td>
            </tr>
            <tr>
                <td>CAMERA_NAME2</td>
                <td>#987654321</td>
                <td>300$</td>
                <td>10</td>
                <td>05/2/2021</td>
                <td>Out for delivery</td>
            </tr>
            <tr>
                <td>CAMERA_NAME3</td>
                <td>#111111111</td>
                <td>400$</td>
                <td>10</td>
                <td>06/2/2021</td>
                <td>Out for delivery</td>
            </tr>
        </table>
    </div>

    <div id="Reviews" class="tabcontent" style="align-items:center;">
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
            <tr>
                <td>CAMERA_NAME</td>
                <td>#123456789</td>
                <td>26/2/2021</td>
                <td>27/2/2021</td>
                <td>1/5</td>
                <td>Very Bad Camera :(</td>
            </tr>
            <tr>
                <td>CAMERA_NAME2</td>
                <td>#987654321</td>
                <td>26/2/2021</td>
                <td>27/2/2021</td>
                <td>5/5</td>
                <td>Very Good Camera :D</td>
            </tr>
            <tr>
                <td>CAMERA_NAME3</td>
                <td>#11111111</td>
                <td>25/2/2021</td>
                <td>26/2/2021</td>
                <td>3/5</td>
                <td>Kinda Good Camera :|</td>
            </tr>
        </table>
    </div>

    <br> <!-- temporary : should change -->
    <br> <!-- temporary : should change -->
    <br> <!-- temporary : should change -->

    <!-- The overlay -->
    <div id="myNav" class="overlay">
        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <a href="./index.php#home" onclick=" closeSideNav()">Home</a>
            <a href=" ./index.php#products" onclick="closeSideNav()">Products</a>
            <a href="./index.php#about" onclick="closeSideNav()">About</a>
            <a href="./index.php#contact" onclick="closeSideNav()">Contact</a>
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
        <a href="" style="color:black">Terms of Use</a>
        <br>
        <br>
        <p style="font-size:15px;">&copy; 2021 G&N , All rights reserved</p>
    </div>

</body>

</html>