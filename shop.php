<?php
    session_start();
    require_once './db_operations/connect.php';
    if(isset($_POST['price']) )
        $_SESSION['price'] = $_POST['price'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./styling/index.css">
    <link rel="stylesheet" type="text/css" href="./styling/shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script type="text/javascript" src="./javascript/index.js"></script>
    <script type="text/javascript" src="./javascript/shop.js"></script>

</head>

<body>
<?php
	include './html/header.html';
?>
    
    <div>
        <button id="filters"
            style="float:left;border-radius:30px;outline:none;background-color: rgb(0, 0, 48);color:white;margin-left:30px;"
            onclick="openFilters()">Open Filters</button>
        <button id="filters2"
            style="float:left;border-radius:30px;outline:none;background-color: rgb(0, 0, 48);color:white;margin-left:30px;"
            onclick="closeFilters()">Close Filters</button>
        <form id="sort" action="" method="post" >
            <input type="radio" name="price" value="asc" onclick="submit()"> Increasing Price<br>
            <input type="radio" name="price" value="dec" onclick="submit()"> Decreasing Price
        </form>
    </div>
    <br><br><br>
    <div class="row">

        <div class="side">
            <h2 style="text-align: center;">Choose filters</h2>
            <h4 style="text-align: center;">Brands</h4>
            <form action="./db_operations/filters.php" method="post">

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
                    <label style="font-size:17px;"> 0 - 13 MP</label><br>
                    <input type="checkbox" name="mp2"  />
                    <label style="font-size:17px;" > 14 - 19 MP</label><br>
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

                <div class="slidecontainer" style="width:200px;text-align: center;margin:auto;">
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
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 9;
                    $offset = ($pageno-1) * $no_of_records_per_page;
                  
                    if (isset($_SESSION['filters']) && !empty($_SESSION['filters']))
                    {
                        $q = $_SESSION['filters'] ;
                        $query = "SELECT COUNT(*) FROM ($q) AS subquery ";
                        $result = mysqli_query($conn,$query);
                        $total_rows = mysqli_fetch_array($result)[0];
       
                        if ($total_rows == 0){
                            ?><div id="noresults"><p style="font-size:40px;text-align:center;margin-left:600px;margin-top:400px;">No results</p></div><?php
                        }else 
                        {
                            ?>
                             <script>
                                document.getElementById("noresults").style.display = "none";
                            </script>
                            <?php
                        }
                        $total_pages = ceil($total_rows / $no_of_records_per_page);
                        if (isset($_SESSION['price']) && !empty($_SESSION['price']))
                        {
                            $price = $_SESSION['price'];
                            if ($price == "asc") 
                            {
                                $sql = "SELECT * FROM ($q) AS subquery ORDER BY price ASC LIMIT $offset, $no_of_records_per_page ";
                            }
                            else
                            {
                                $sql = "SELECT * FROM ($q) AS subquery ORDER BY price DESC LIMIT $offset, $no_of_records_per_page ";
                            }   
                        }
                        else
                        {
                            $sql = "SELECT * FROM ($q) AS subquery LIMIT $offset, $no_of_records_per_page ";
                        }
                    }
                    else
                    {
                        $query = "SELECT COUNT(*) FROM `products`";
                        $result = mysqli_query($conn,$query);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);
                        if (isset($_SESSION['price']) && !empty($_SESSION['price']))
                        {
                            $price = $_SESSION['price'];
                            if ($price == "asc") 
                            {
                                $sql = "SELECT * FROM `products`  AS subquery ORDER BY price ASC  LIMIT $offset, $no_of_records_per_page ";
                            }
                            else
                            {
                                $sql = "SELECT * FROM `products` AS subquery ORDER BY price DESC LIMIT $offset, $no_of_records_per_page ";
                            }   
                        }
                        else
                        {
                            $sql = "SELECT * FROM `products` AS subquery LIMIT $offset, $no_of_records_per_page ";
                        }
                    }
                    $res_data = mysqli_query($conn,$sql);
                    $i = 0;
                    while($row = mysqli_fetch_array($res_data) and $i<9) 
                    { ?>
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
                                    <h4>Megapixels : <b><?php echo $row[3].'MP';?></b></h4>
                                    <h4>Optical Zoom : <b><?php echo $row[4].'x';?></b></h4>
                                    <h4>Digital Zoom : <b><?php echo $row[5].'x';?></b></h4>
                                    <h4>Screen : <b><?php echo $row[6].'"';?></b></h4>
                                    <h4>Color : <b><?php echo $row[7];?></b></h4>
                                    <h4>Price : <b><?php echo $row[8].' $';?></b></h4>
                                    <!-- add to cart -->
                                    <form method="post">
                                        <button type="submit" name="<?php echo $row[0];?>" style="border-radius: 70px;">Add to Cart</button>
                                        <?php
                                            if (isset($_POST[$row[0]])) {

                                                $query = mysqli_query($conn,"SELECT * FROM cart WHERE userId={$_SESSION['id']} and id={$row[0]}");
                                                if (mysqli_num_rows($query)!=0)
                                                {
                                                    $query = mysqli_query($conn,"SELECT CAST(amount AS UNSIGNED) FROM cart WHERE userId={$_SESSION['id']} and id={$row[0]}");
                                                    $query = mysqli_fetch_array($query);
                                                    foreach ($query as $key => $value){}
                                                    $value = $value + 1;
                                                    echo $value;
                                                    $result = mysqli_query($conn,
                                                    "UPDATE cart 
                                                    SET amount = $value 
                                                    WHERE userId={$_SESSION['id']} and id={$row[0]}");
                                                }
                                                else
                                                {
                                                    $result = mysqli_query($conn,"INSERT INTO cart (userId, id, amount) (SELECT u.id, p.id, '1' FROM users u, products p WHERE u.id={$_SESSION['id']} and p.id={$row[0]})     ");
                                                }
                                                unset($_POST[$row[0]]);
                                            }
                                        ?>
                                    </form>
                                    <!-- add to wishlist -->
                                    <form method="post">
                                        <button type="submit" name="<?php echo $row[0]."2";?>" style="border-radius: 70px;">Wishlist</button>
                                        <?php
                                            if (isset($_POST[$row[0]."2"])) {

                                                $query2 = mysqli_query($conn,"SELECT * FROM wishlist WHERE userId={$_SESSION['id']} and id={$row[0]}");
                                                if (mysqli_num_rows($query2)==0)
                                                {
                                                    $result2 = mysqli_query($conn,"INSERT INTO wishlist (userId, id) (SELECT u.id, p.id FROM users u, products p WHERE u.id={$_SESSION['id']} and p.id={$row[0]})     ");
                                                }
                                                unset($_POST[$row[0]]);
                                            }
                                        ?>
                                </form>
                                </div>
                            </div> 
                        </div>   
            <?php 
            $i++;  } 

            ?>

        </div>

    </div>
    <div id ="page">
        <ul class="pagination" >
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li><a href="?pageno=1">1</a></li>
        <li class="<?php if($total_pages == 0){ echo 'disabled'; } ?>"><a href="?pageno=<?php echo $total_pages; ?>">2</a></li>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        </ul>
    </div>

    <hr> <!-- thematic break -->
    <div class=" footer" style="width: 400px;margin-left: auto;margin-right: auto;text-align: center;">
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