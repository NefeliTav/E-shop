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
    <link rel="stylesheet" type="text/css" href="./styling/index.css">
    <link rel="stylesheet" type="text/css" href="./styling/compare.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="index.js"></script>

</head>

<body>
<?php
	include './html/header.html';
?>
    <div class="compareGrid">
        <?php
        require_once './db_operations/connect.php';
        $query = "SELECT * FROM products where id in (select id from wishlist where userId= " .$_SESSION['id']." )";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="compareGridItem">
                <div class="card">
                    <img class="productPhoto" src='<?php echo $row[9]; ?>' alt='<?php echo $row[2]; ?>' style="width:400px; max-height: 300px;">
                    <hr>
                    <div class="cardContainer">
                        <h2><b><?php echo $row[1]; ?></b></h2>
                        <p class="price"><?php echo $row[8]; ?>$</p>
                        <p>Resolution (MP): <?php echo $row[3]; ?></p>
                        <p>Optical Zoom: <?php echo $row[4]; ?></p>
                        <p>Digital Zoom: <?php echo $row[5]; ?></p>
                        <p>Screen: <?php echo $row[6]; ?> inch</p>
                        <input style="margin-left: 10%; margin-right: auto;" type="button" class="buttonCompare" value="Remove">
                        <input style="margin-left: 7% ; margin-right: auto; margin-top: 10px; margin-bottom: 10px;" type="button" class="buttonCompare" value="Purchase">
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>




    
    <?php include('./html/footer.html'); ?>


</body>

</html>