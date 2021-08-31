<?php
    session_start();
    require_once './db_operations/connect.php';
    unset($_SESSION['filters']);
    unset($_SESSION['price']);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript" src="./javascript/index.js"></script>

</head>

<body>
<?php
	include './html/header.html';
?>

    
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
                <a role="button" title="shop" id="shop-btn" style="border-radius:50px;background-color:#010c27;color:white;font-size:20px;width:120px;height:45px;border: none;"
                class="btn" href="./shop.php">
                Shop now
                </a>

            
            <div class="grid-container" >
                <div class="productButton" id="catalog"><a class="productLink" ><img src="./images/catalog.png"
                            alt="catalog" width="180" height="180"></a>
                </div>
                <div class="productButton" id="hob"><a class="productLink" ><img src="./images/photo1.png" alt="hobbyist"
                            width="335" height="471"></a>
                </div>
                <div class="productButton" id="adv"><a class="productLink" ><img src="./images/photo2.png" alt="advanced"
                            width="300" height="471"></a>
                </div>
                <div class="productButton" id="prof"><a class="productLink" ><img src="./images/photo3.png"
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
                    <div class="column-33" style="padding-left:10px !important;padding-top:0px;">
                        <h1 class="xlarge-font">About</h1>
                        <h1 class="medium-font" style="color:#010c27;">A lifetime of photography</h1>
                        <p style="font-size:18px;">In 1919, a small photography bussines operated out of Smyrna. Over a
                            hundread years later, that same
                            bussiness has evolved and prospered, spreading to many locations across Greece in the
                            proccess. Find more about our shop locations, schedule
                            and contact information bellow.</p>
                            <p style="font-size:20px;"><b>Watch this tutorial to get a taste of photography.</b></p>
                    </div>
                    <div class=" column-66" id="video">
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
                        <?php
                            if (isset($_SESSION['failed']) && $_SESSION['failed']!=""){?>                               
                                <div class="failure" style="margin-bottom: 10px;font-size: 18px;color: red;"><?php echo $_SESSION['failed']; ?></div>
                        <?php unset($_SESSION['failed']);}
                        ?>
                        <form action="./db_operations/contact.php" method="post">
                            <label for="email" style="font-size:18px;font-weight:normal;">Email:</label><br>
                            <input
                                style="background-color:#f1f1f1;border:none;text-align:center;font-size:18px;border-radius:30px;width:270px;height:40px;outline:none;"
                                type="email" id="email" name="email" required><br><br>
                            <label for="textarea" style="font-size:18px;font-weight:normal;">Ask us
                                anything:</label><br>
                            <textarea name="text" 
                                style="resize: none;background-color:#f1f1f1;padding:1rem;font-size:24px;border-radius:30px;border:none;width:280px;height:300px;outline:none;"
                                id="field" onkeyup="countChar(this)" required></textarea>
                            <div id="charNum"></div>
                            <span id='message2'></span>
                            <br>
                            <input type="checkbox" id="checkbox" name="checkbox" value=0>
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
                            <li><span>Tuesday : 9am - 5pm</span></li>
                            <li><span>Wednesday : 9am - 5pm</span></li>
                            <li><span>Thursday : 9am - 5pm</span></li>
                            <li><span>Friday : 9am - 5pm</span></li>
                            <li><span>Saturday : Closed</span></li>
                            <li><span>Sunday : Closed</span></li>
                        </ul>
                        <br>
                        <p style="font-size:22px">For more info:</p><br>

                        <i style="font-size:24px;background: none;" class="fa">&#xf095;</i><a style="font-size:22px"
                            href="https://api.whatsapp.com/send?phone=302102222222">+30 222 222 2222</a><br>
                        <i style="font-size:24px;background: none;" class="fa">&#xf0e0;</i>
                        <a style="font-size:22px" href="mailto: abc@example.com">e-shop@gmail.com</a>
                    </div>

                </div>
            </div>


            <?php include('./html/footer.html'); ?>
 

</body>

</html>
