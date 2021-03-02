<?php
    require_once 'connect.php';
    $query = $result = "";

    if(isset($_POST['price']))
	{
        $price = $_POST['price'];
        if ($price == "asc") 
        {
            $query = "SELECT * FROM products ORDER BY price ASC";
        }
        else
        {
            $query = "SELECT * FROM products ORDER BY price DESC";
        }    
        $result = mysqli_query($conn,$query);
        if ($result)
        {
            while($row = mysqli_fetch_array($result)) 
            {
                /*
                echo $row['id'];
                echo $row['name'];
                echo $row['brand'];
                echo $row['mp'];
                echo $row['optical'];
                echo $row['digital'];
                echo $row['screen'];
                echo $row['color'];
                */
                echo $row['price']; 
            }
			header('Location: shop.php');
            mysqli_close($conn); 
        }
        else
        {
            echo 'Failed';
			header('Location: shop.php');
            mysqli_close($conn);
        }
		
    }

?>

