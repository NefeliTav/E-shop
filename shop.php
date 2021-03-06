
<?php
    session_start();
    require_once 'connect.php';
    $query = $price = $red = $white = $blue = $green = $grey = $black = $canon = $nikon = $sony = "";
    $fujifilm = $leica = $panasonic = $mp1 = $mp2 = $mp3 = $mp4 = $optical1 = $optical2 = "";
    $optical3 = $optical4 = $digital1 = $digital2 = $digital3 = $digital4 = $screen1 = $screen2 = $screen3 = "";
    $query2 = $query3 = $query4 = $query5 = $query6 = "";
    if(isset($_POST['apply']))
	{

        if(isset($_POST['green'])) $green = "SELECT * FROM products WHERE color = 'green'";
        if(isset($_POST['blue'])) $blue = "SELECT * FROM products WHERE color = 'blue'";
        if(isset($_POST['red'])) $red = "SELECT * FROM products WHERE color = 'red'";
        if(isset($_POST['white'])) $white = "SELECT * FROM products WHERE color = 'white'";
        if(isset($_POST['black'])) $black = "SELECT * FROM products WHERE color = 'black'";
        if(isset($_POST['grey'])) $grey = "SELECT * FROM products WHERE color = 'grey'";
        
        if(isset($_POST['canon'])) $canon = "SELECT * FROM products WHERE brand = 'canon'";
        if(isset($_POST['nikon'])) $nikon = "SELECT * FROM products WHERE brand = 'nikon'";
        if(isset($_POST['sony'])) $sony = "SELECT * FROM products WHERE brand = 'sony'";
        if(isset($_POST['fujifilm'])) $fujifilm = "SELECT * FROM products WHERE brand = 'fujifilm'";
        if(isset($_POST['leica'])) $leica = "SELECT * FROM products WHERE brand = 'leica'";
        if(isset($_POST['panasonic'])) $panasonic = "SELECT * FROM products WHERE brand = 'panasonic'";
        
        if(isset($_POST['mp1'])) $mp1 = "SELECT * FROM products WHERE mp <= 13" ;
        if(isset($_POST['mp2'])) $mp2 = "SELECT * FROM products WHERE mp > 13 AND mp <= 19";
        if(isset($_POST['mp3'])) $mp3 = "SELECT * FROM products WHERE mp = 16";
        if(isset($_POST['mp4'])) $mp4 = "SELECT * FROM products WHERE mp >= 20";
           
        if(isset($_POST['optical1'])) $optical1 = "SELECT * FROM products WHERE optical <= 10" ;
        if(isset($_POST['optical2'])) $optical2 = "SELECT * FROM products WHERE optical > 10 AND optical <= 30";
        if(isset($_POST['optical3'])) $optical3 = "SELECT * FROM products WHERE optical > 30 AND optical <= 50";
        if(isset($_POST['optical4'])) $optical4 = "SELECT * FROM products WHERE optical > 50 AND optical <= 70";  

        if(isset($_POST['digital1'])) $digital1 = "SELECT * FROM products WHERE digital <= 10" ;
        if(isset($_POST['digital2'])) $digital2 = "SELECT * FROM products WHERE digital > 10 AND digital <= 30";
        if(isset($_POST['digital3'])) $digital3 = "SELECT * FROM products WHERE digital > 30 AND digital <= 50";
        if(isset($_POST['digital4'])) $digital4 = "SELECT * FROM products WHERE digital > 50 AND digital <= 70";  

        if(isset($_POST['screen1'])) $screen1 = "SELECT * FROM products WHERE screen <= 1.9" ;
        if(isset($_POST['screen2'])) $screen2 = "SELECT * FROM products WHERE screen >= 2 AND screen <= 2.9";
        if(isset($_POST['screen3'])) $screen3 = "SELECT * FROM products WHERE screen >= 3 AND screen <= 3.9";

        if(isset($_POST['price'])) $price = "SELECT * FROM products WHERE price <= '".$_POST["price"]."'";

        if ($green)
        {
            $query = "$green";
        }
        if ($blue)
        {
            if($query)
                $query = "$blue UNION ALL $query";
            else
                $query = "$blue";
        }
        if ($red)
        {
            if($query)
                $query = "$red UNION ALL $query";
            else
                $query = "$red";
        }
        if ($white)
        {
            if($query)
                $query = "$white UNION ALL $query";
            else
                $query = "$white";
        }
        if ($black)
        {
            if($query)
                $query = "$black UNION ALL $query";
            else
                $query = "$black";
        }
        if ($grey)
        {
            if($query)
                $query = "$grey UNION ALL $query";
            else
                $query = "$grey";
        }
        /*--------------------------------------------------------*/
        if ($mp1)
        {
            $query2 = "$mp1";
        }
        if ($mp2)
        {
            if($query2)
                $query2 = "$mp2 UNION ALL $query2";
            else
                $query2 = "$mp2";
        }
        if ($mp3)
        {
            if($query2)
                $query2 = "$mp3 UNION ALL $query2";
            else
                $query2 = "$mp3";
        }
        if ($mp4)
        {
            if($query2)
                $query2 = "$mp4 UNION ALL $query2";
            else
                $query2 = "$mp4";
        }
        /*--------------------------------------------------------*/

        if ($optical1)
        { 
            $query3 = "$optical1";
        }
        if ($optical2)
        {
            if($query3)
                $query3 = "$optical2 UNION ALL $query3";
            else
                $query3 = "$optical2";
        }
        if ($optical3)
        {
            if($query3)
                $query3 = "$optical3 UNION ALL $query3";
            else
                $query3 = "$optical3";
        }
        if ($optical4)
        {
            if($query3)
                $query3 = "$optical4 UNION ALL $query3";
            else
                $query3 = "$optical4";
        }
        /*--------------------------------------------------------*/

        if ($digital1)
        {
            $query4 = "$digital1";
        }
        if ($digital2)
        {
            if($query4)
                $query4 = "$digital2 UNION ALL $query4";
            else
                $query4 = "$digital2";
        }
        if ($digital3)
        {
            if($query4)
                $query4 = "$digital3 UNION ALL $query4";
            else
                $query4 = "$digital3";
        }
        if ($digital4)
        {
            if($query4)
                $query4 = "$digital4 UNION ALL $query4";
            else
                $query4 = "$digital4";
        }
        /*--------------------------------------------------------*/

        if ($screen1)
        {
            $query5 = "$screen1";
        }
        if ($screen2)
        {
            if($query5)
                $query5 = "$screen2 UNION ALL $query5";
            else
                $query5 = "$screen2";
        }
        if ($screen3)
        {
            if($query5)
                $query5 = "$screen3 UNION ALL $query5";
            else
                $query5 = "$screen3";
        }
        /*--------------------------------------------------------*/

        if ($canon)
        {
            $query6 = "$canon";
        }
        if ($nikon)
        {
            if($query6)
                $query6 = "$nikon UNION ALL $query6";
            else
                $query6 = "$nikon";
        }
        if ($sony)
        {
            if($query6)
                $query6 = "$sony UNION ALL $query6";
            else
                $query6 = "$sony";
        }
        if ($fujifilm)
        {
            if($query6)
                $query6 = "$fujifilm UNION ALL $query6";
            else
                $query6 = "$fujifilm";
        }
        if ($leica)
        {
            if($query6)
                $query6 = "$leica UNION ALL $query6";
            else
                $query6 = "$leica";
        }
        if ($panasonic)
        {
            if($query6)
                $query6 = "$panasonic UNION ALL $query6";
            else
                $query6 = "$panasonic";
        }
        /*--------------------------------------------------------*/

        if ($price)
        {
            if($query)
                $query = 
                "SELECT DISTINCT first.id,first.name,first.brand,first.mp,first.optical,first.digital,first.screen,first.color,first.price,first.image 
                FROM ($price) as first 
                INNER JOIN ($query) as second 
                    ON (first.color = second.color)
                ";
            else
                $query = "$price";
        }
        if ($query2)
        {
            $query = "SELECT DISTINCT first.id,first.name,first.brand,first.mp,first.optical,first.digital,first.screen,first.color,first.price,first.image  
            FROM ($query) as first 
            INNER JOIN ($query2) as second 
                ON (first.mp = second.mp)";
        }
        if ($query3)
        {
            $query = "SELECT DISTINCT first.id,first.name,first.brand,first.mp,first.optical,first.digital,first.screen,first.color,first.price,first.image  
            FROM ($query) as first 
            INNER JOIN ($query3) as second 
                ON (first.optical = second.optical)";
        }

        if ($query4)
        {
            $query = "SELECT DISTINCT first.id,first.name,first.brand,first.mp,first.optical,first.digital,first.screen,first.color,first.price,first.image  
            FROM ($query) as first 
            INNER JOIN ($query4) as second 
                ON (first.digital = second.digital)";
        }
        if ($query5)
        {
            $query = "SELECT DISTINCT first.id,first.name,first.brand,first.mp,first.optical,first.digital,first.screen,first.color,first.price,first.image  
            FROM ($query) as first 
            INNER JOIN ($query5) as second 
                ON (first.screen = second.screen)";
        }
        if ($query6)
        {
            $query = "SELECT DISTINCT first.id,first.name,first.brand,first.mp,first.optical,first.digital,first.screen,first.color,first.price,first.image  
            FROM ($query) as first 
            INNER JOIN ($query6) as second 
                ON (first.brand = second.brand)"; 
        }


        $result = mysqli_query($conn,$query);
        if ($result)
        {
            $_SESSION['filters'] = $query;
        }
        else
        {
            echo 'Failed';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <script type="text/javascript" src="shop.js"></script>

</head>

<body>
    <div class="header">
        <a href="./index.php"><img src="./images/logo.jpg" class="logo"></a>
        <div class="topnav" id="topnav">
            <a class="active" href="./index.php">Home</a>
            <a href="./index.php#products">Products</a>
            <a href="./index.php#about">About</a>
            <a href="./index.php#photography">Introduction to Photography</a>
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

        <a href="#" role="button" title="login" id="login" style="color:black;font-size:20px;width:75px"
            class="btn btn-success btn-lg">
            log in
        </a>
        <a href="" id="cart" title="shopping cart" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-shopping-cart" style="color:black;"></span>
        </a>
        <a href="" id="heart" title="wishlist" class="btn btn-success btn-lg">
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
    <br>
    <br>
    <br>

    <!-- The overlay -->
    <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <a href="./index.php#home" onclick=" closeSideNav()">Home</a>
            <a href=" ./index.php#products" onclick="closeSideNav()">Products</a>
            <a href="./index.php#about" onclick="closeSideNav()">About</a>
            <a href="./index.php#photography" onclick="closeSideNav()">Introduction to Photography</a>
            <a href="./index.php#contact" onclick="closeSideNav()">Contact</a>

        </div>

    </div>
    
    <button id="filters"
        style="margin:30px;border-radius:30px;outline:none;background-color: rgb(0, 0, 48);color:white;"
        onclick="openFilters()">Open
        Filters</button>
    <button id="filters2"
        style="margin:30px;border-radius:30px;outline:none;background-color: rgb(0, 0, 48);color:white;"
        onclick="closeFilters()">Close
        Filters</button>
    <!--
    <div style="width: 400px;">
        <form id="sort" action="sort.php" method="post">
            <p style=" font-size:18px;">Sort by</p>
            <input type="radio" name="price" value="asc" onclick="submit()"> Increasing Price<br>
            <input type="radio" name="price" value="dec" onclick="submit()"> Decreasing Price
        </form>
    </div>
    -->

    <div class="row">

        <div class="side">
            <h2 style="text-align: center;">Choose filters</h2>
            <h4 style="text-align: center;">Brands</h4>
            <form action="#" method="post">

            <div class="vertical-menu">

                    <input type="checkbox" name="canon" />
                    <label style="font-size:17px;"> Canon</label><br>
                    <input type="checkbox" name="nikon" />
                    <label style="font-size:17px;" > Nikon</label><br>
                    <input type="checkbox" name="sony" />
                    <label style="font-size:17px;" > Sony</label><br>
                    <input type="checkbox" name="fujifim" />
                    <label style="font-size:17px;" > Fujifilm</label><br>
                    <input type="checkbox" name="leica" />
                    <label style="font-size:17px;" > Leica</label><br>
                    <input type="checkbox" name="panasonic" />
                    <label style="font-size:17px;" > Panasonic</label><br><br>
            </div>
            <h4 style="text-align: center;">Megapixels</h4>

            <div class="vertical-menu">

                    <input type="checkbox" name="mp1"  />
                    <label style="font-size:17px;"> -13 MP</label><br>
                    <input type="checkbox" name="mp2"  />
                    <label style="font-size:17px;" > 14-19 MP</label><br>
                    <input type="checkbox" name="mp3"  />
                    <label style="font-size:17px;" > 16 MP</label><br>
                    <input type="checkbox" name="mp4"  />
                    <label style="font-size:17px;" > 20+ MP</label><br>

            </div>

            <h4 style="text-align: center;">Optical Zoom</h4>
            <div class="vertical-menu">
                    <input type="checkbox" name="optical1" />
                    <label style="font-size:17px;" > 0 - 10 x</label><br>
                    <input type="checkbox" name="optical2" />
                    <label style="font-size:17px;" > 11 - 30 x</label><br>
                    <input type="checkbox"name="optical3" />
                    <label style="font-size:17px;"> 31 - 50 x</label><br>
                    <input type="checkbox" name="optical4" />
                    <label style="font-size:17px;" > 51 - 70 x</label><br>
            </div>
            <h4 style="text-align: center;">Digital Zoom</h4>
            <div class="vertical-menu">
                    <input type="checkbox"  name="digital1"/>
                    <label style="font-size:17px;" > 0 - 10 x</label><br>
                    <input type="checkbox"  name="digital2"/>
                    <label style="font-size:17px;" > 11 - 30 x</label><br>
                    <input type="checkbox" name="digital3"/>
                    <label style="font-size:17px;" > 31 - 50 x</label><br>
                    <input type="checkbox" name="digital4" />
                    <label style="font-size:17px;"> 51 - 70 x</label><br>
            </div>
            <h4 style="text-align: center;">Screen</h4>
            <div class="vertical-menu">
                    <input type="checkbox"  name="screen1"/>
                    <label style="font-size:17px;" > 1'' - 1.9''</label><br>
                    <input type="checkbox" name="screen2"/>
                    <label style="font-size:17px;" > 2'' - 2.9''</label><br>
                    <input type="checkbox"  name="screen3"/>
                    <label style="font-size:17px;" > 3'' - 3.9''</label><br>

            </div>
            <h4 style="text-align: center;">Color</h4>
            <div class="vertical-menu" >
                    <input type="checkbox"  name="green"/>
                    <label style="font-size:17px;color:green;" > Green</label><br>
                    <input type="checkbox" name="blue"/>
                    <label style="font-size:17px;color:blue;" > Blue</label><br>
                    <input type="checkbox"  name="red"/>
                    <label style="font-size:17px;color:red;" >Red</label><br>
                    <input type="checkbox"  name="white"/>
                    <label style="font-size:17px;color:rgb(200, 200, 200);" > White</label><br>
                    <input type="checkbox" name="black"/>
                    <label style="font-size:17px;color:black;" > Black</label><br>
                    <input type="checkbox"  name="grey"/>
                    <label style="font-size:17px;color:grey;" > Grey</label><br>

            </div>
            <h4 style="text-align: center; ">Price ($)</h4>

                <div class="slidecontainer" style="width:300px;text-align: center;margin:auto;">
                    <input name="price" type="range" min="1" max="3000" value="500" onchange="detectChange(this.value)">
            <div class="range">
                <output style="color:black;font-size:17px" id="output" name="result"></output>
            </div>
            <button name="apply" style="margin:30px;border-radius:30px;outline:none;background-color: rgb(0, 0, 48);color:white;">Apply
            Filters</button>
            </form>
        </div>
    </div>

    <div class="main">
        <div class="row">
            <?php
                    if (isset($_SESSION['filters']) && !empty($_SESSION['filters']))
                    {
                        $query = $_SESSION['filters'];
                    }
                    else
                    {
                        $query = "SELECT * FROM products";
                    }
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($result)) 
                    {?>
                        <div class="column">
                            <div class="card" id="<?php echo $row[0];?>">
                                <nav>
                                    <div class="game-title" style="font-size:22px;text-align:center;"><?php echo $row[1];?></div>
                                </nav>
                                <div class="zoom">
                                    <img style=" display: block;margin-left: auto;margin-right: auto;" height="200" width="200"
                                        alt="camera" src='<?php  echo $row[9]; ?>'>
                                </div>
                                <div class="description">
                                    <h4>Megapixels :<b> <?php echo $row[3].'MP';?></b></h4>
                                    <h4>Optical Zoom :<b><?php echo $row[4].'x';?></b></h4>
                                    <h4>Digital Zoom :<b><?php echo $row[5].'x';?></b></h4>
                                    <h4>Screen : <b><?php echo $row[6].'"';?></b></h4>
                                    <h4>Color : <b><?php echo $row[7];?></b></h4>
                                    <h4>Price : <b><?php echo $row[8].' $';?></b></h4>

                                    <button style="border-radius: 70px;">Add to Cart</button>
                                    <button style="border-radius: 70px;">Wishlist</button>
                                </div>
                            </div> 
                        </div>   
            <?php }

                unset($_SESSION['filters']);
                mysqli_close($conn); 
            ?>
        </div>

    </div>
    <div>
        <ul class="pagination " style="width: 400px;">
            <li class=" page-item"><a style="color:black;" class="page-link" href="javascript:void(0);">Previous</a>
            </li>
            <li class="page-item"><a style="color:black;" class="page-link" href="javascript:void(0);">1</a></li>
            <li class="page-item"><a style="color:black;" class="page-link" href="javascript:void(0);">2</a></li>
            <li class="page-item"><a style="color:black;" class="page-link" href="javascript:void(0);">Next</a></li>
        </ul>
    </div>
    <hr> <!-- thematic break -->
    <div class=" footer" style="width: 400px;margin-left: auto;margin-right: auto;">
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