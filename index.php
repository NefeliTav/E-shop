<?php
    session_start();
    require_once 'connect.php';

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
                    /*$_SESSION['id']=$arr[0];*/
                    $_SESSION['firstname']=$arr[0];
                    $_SESSION['lastname']=$arr[1];
                    $_SESSION['email']=$arr[2];
                    $_SESSION['tel']=$arr[3];
                    $_SESSION['address']=$arr[4];
                    $_SESSION['postcode']=$arr[5];
                    $_SESSION['password']=$arr[6];
                    $_SESSION['birthday']=$arr[7];
                    $_SESSION['terms']=$arr[8];
                    $_SESSION['newsletter']=$arr[9];

                }
                else
                {
                    $_SESSION['failure'] = 'Wrong username or password.';
                }
            } 
        }
        else
        {
            $_SESSION['failure'] = 'Wrong username or password.';

        }
    }

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

		$query = "INSERT INTO users (firstname, lastname, email, tel, addr, postcode, psw) VALUES ('$firstname', '$lastname', '$email', '$tel', '$address', '$postcode', '$passwordHash')";
		$result = mysqli_query($conn,$query);
        if ($result)
        {
            /*$_SESSION['id']=$arr[0];*/
            $_SESSION['firstname']=$firstname;
            $_SESSION['lastname']=$lastname;
            $_SESSION['email']=$email;
            $_SESSION['tel']=$tel;
            $_SESSION['address']=$address;
            $_SESSION['postcode']=$postcode;
            $_SESSION['password']=$password;
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
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript" src="index.js"></script>

</head>

<body>
    <div class="header">
        <a href="./index.php"><img src="./images/logo.jpg" class="logo"></a>
        <div class="topnav" id="topnav">
            <a class="active" href="">Home</a>
            <a href="#products">Products</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>

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
        <a href="#" role="button" title="login" id="login" style="color:black;font-size:20px;width:75px;height:45px;"
            class="btn btn-success btn-lg">
            log in
        </a>
        <a href="./profile.php" role="button" title="profile" id="profile" style="color:black;font-size:20px;padding-bottom:3.5rem;width:75px"
            class="btn btn-success btn-lg">
            profile
        </a>
        <a href="" id="cart" title="shopping cart" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-shopping-cart" style="color:black;"></span>
        </a>
        <a href="" id="heart" title="wishlist" class="btn btn-success btn-lg">
            <span style="font-size:18px;background: none;" class="fa">&#xf004;</span>
        </a>

        <div id="myModal"  class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1 style="font-size:30px;text-align:center;">Log in</h1>
                <hr>
                <div class="form-popup">

                    <form action="" method="post" class="form-container">
                        
                            <?php 
                                if (isset($_SESSION['failure']) && ($_SESSION['failure']!="")) {?>
                                    <div class="failure" style="margin-bottom: 10px;font-size: 18px;color: red;"><?php echo $_SESSION['failure']; ?></div>
                            <?php }
                                else if($_SESSION['email']!="")
                                { ?>
                                    <script>
                                        document.getElementById("login").style.display = "none";
                                        document.getElementById("profile").style.display = "block";
                                    </script>
                            <?php
                                }else{
                                    ?>
                                    <script>
                                        document.getElementById("login").style.display = "block";
                                        document.getElementById("profile").style.display = "none";
                                    </script>
                            <?php
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
                    <form action="" method="post" id="form-container2" class="form-container">

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
    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="./images/1.carousel.jpg" alt="Style">
                <div class="carousel-caption">
                    <h2>Style</h2>
                    <p>Express Yourshelf</p>
                </div>
            </div>

            <div class="item">
                <img src="./images/2.carousel.jpg" alt="Memories">
                <div class="carousel-caption">
                    <h2>Memories</h2>
                    <p>Capture the Moment</p>
                </div>
            </div>

            <div class="item">
                <img src="./images/3.carousel.jpg" alt="Art">
                <div class="carousel-caption">
                    <h2>Art</h2>
                    <p>Let your creativity Flow</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <br>

    <hr>

    <!-- Containers -->

    <div>
        <!-- Products -->

        <div class="container" id="products" >
            <h1 class="xlarge-font">Products</h1>
            <h2 style="font-size:35px">Take photos like a pro </h2>
            <p><span style="font-size:25px">From the experienced professional to the aspiring hobbyist, our curated
                    selection of cameras offers something for everyone</span> </p>
            <br>

            <div class="grid-container" >
                <div class="productButton" id="catalog"><a class="productLink" href="./shop.php"><img src="./images/catalog.png"
                            alt="catalog" width="180" height="180"></a>
                </div>
                <div class="productButton" id="hob"><a class="productLink" href="#"><img src="./images/photo1.png" alt="hobbyist"
                            width="335" height="471"></a>
                </div>
                <div class="productButton" id="adv"><a class="productLink" href="#"><img src="./images/photo2.png" alt="advanced"
                            width="300" height="471"></a>
                </div>
                <div class="productButton" id="prof"><a class="productLink" href="#"><img src="./images/photo3.png"
                            alt="professional" width="335" height="471"></a>
                </div>

                <div class="categoryText" style="height:160px;padding-top:20px;">
                    <h3  id="prod" class="categoryTitle">Catalog</h3>
                    <p class="categoryDescription">Browse all of our products.</p>
                </div>
                <div class="categoryText" style="height:160px;padding-top:20px;">
                    <h3  id="prod" class="categoryTitle">Hobbyist</h3>
                    <p class="categoryDescription">Looking to get into Photography? Then these cameras are perfect for
                        you!</p>
                </div>
                <div class="categoryText" style="height:160px;padding-top:20px;">
                    <h3  id="prod" class="categoryTitle">Advanced</h3>
                    <p class="categoryDescription">The perfect tools for a seasoned photographer looking to up his game.
                    </p>

                </div>
                <div class="categoryText" style="height:160px;padding-top:20px;">
                    <h3  id="prod" class="categoryTitle">Professional</h3>
                    <p class="categoryDescription">These cameras will take your work to the next level.</p>

                </div>

            </div>
        </div>

                <!-- About -->

            <div class="container" name="about" id="about" style="margin-top: 100px;margin-bottom: 100px;">
                <div class="row">
                    <div class="column-33" style="padding-left:10px !important;padding-top:0px">
                        <h1 class="xlarge-font">About</h1>
                        <h1 class="medium-font" style="color:#010c27;">A lifetime of photography</h1>
                        <p style="font-size:18px;">In 1919, a small photography bussines operated out of Smyrna. Over a
                            hundread years later, that same
                            bussiness has evolved and prospered, spreading to many locations across Greece in the
                            proccess. Find more about our shop locations, schedule
                            and contact information bellow.</p>
                            <p style="font-size:20px;"><b>Watch this tutorial to get a taste of photography.</b></p>
                        
                    </div>
                    <div class=" column-66" id="video" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="600" height="450"
                                src="https://www.youtube.com/embed/z_3ZyAX_3gY" frameborder="0" allowfullscreen
                                ng-show="showvideo"></iframe>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Contact -->

            <div class="container" name=contact id="contact"  >
                <h1 class="xlarge-font" style="text-align: center;">Contact Us</h1><br>
                <div class="row">
                    <div class="column-33" id="column-cnt">
                        <p><span style="font-size:22px;">We are here to answer your questions.</span></p>
                        <br><br>
                        <form action="contact.php" method="post">
                            <label for="email" style="font-size:18px;font-weight:normal;">Email:</label><br>
                            <input
                                style="background-color:#f1f1f1;border:none;text-align:center;font-size:18px;border-radius:30px;width:270px;height:40px;outline:none;"
                                type="email" id="email" name="email" required><br><br>
                            <label for="textarea" style="font-size:18px;font-weight:normal;">Ask us
                                anything:</label><br>
                            <textarea name="text" 
                                style="background-color:#f1f1f1;padding:1rem;font-size:24px;border-radius:30px;border:none;width:280px;height:300px;outline:none;"
                                id="field" onkeyup="countChar(this)" required></textarea>
                            <div id="charNum"></div>
                            <span id='message2'></span>
                            <br>
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <label for="checkbox" style="font-weight:normal;font-size:17px;">Subscribe to our
                                Newsletter</label>
                            <br>
                            <!--
                            <div class="text-xs-center">
                                <div class="g-recaptcha" data-sitekey=""
                                    data-callback="verifyRecaptchaCallback"
                                    data-expired-callback="expiredRecaptchaCallback">
                                </div>
                            </div>
                            -->
                            <button class="btn" type="submit" name="submit3" id="sbmt"
                                style="color:white;background-color:#010c27;margin-top:15px;font-size:18px;border-radius:30px;width:270px;height:40px;outline:none;">Send
                                message</button>
                        </form>
                    </div>
                    <div class="column-66">
                        <p><span style="font-size:22px">Where to find us:</span></p>
                        <br>
                        <ul id="menu-centered" style="font-size:18px;">
                            <li><span>Solonos 12 ,Kolonaki</span></li>
                            <li><span>Chelidonous 50 ,Kifisia</span></li>
                            <li><span>Venetias 8 ,Mykonos</span></li>
                        </ul>
                        <p style="font-size:22px;margin-top:20px;">Opening hours:</p><br>

                        <ul id="menu-centered" style="font-size:18px;">
                            <li><span>Monday : 9am - 5pm</span></li>
                            <li><span>Tuesday :9am - 5pm</span></li>
                            <li><span>Wednesday :9am - 5pm</span></li>
                            <li><span>Thursday :9am - 5pm</span></li>
                            <li><span>Friday :9am - 5pm</span></li>
                            <li><span>Saturday : Closed</span></li>
                            <li><span>Sunday : Closed</span></li>
                        </ul>
                        <br>
                        <p style="font-size:22px">For more info:</p><br>

                        <i style="font-size:24px;background: none;" class="fa">&#xf095;</i><a style="font-size:22px"
                            href="https://api.whatsapp.com/send?phone=302102536985">+30 210 253 6985</a><br>
                        <i style="font-size:24px;background: none;" class="fa">&#xf0e0;</i>
                        <a style="font-size:22px" href="mailto: abc@example.com">e-shop@gmail.com</a>
                    </div>

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