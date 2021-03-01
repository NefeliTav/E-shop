<?php
    require_once 'connect.php';
    $query = $price = $red = $white = $blue = $green = $grey = $black = $canon = $nikon = $sony = "";
    $fujifilm = $leica = $panasonic = $mp1 = $mp2 = $mp3 = $mp4 = $optical1 = $optical2 = "";
    $optical3 = $optical4 = $digital1 = $digital2 = $digital3 = $digital4 = $screen1 = $screen2 = $screen3 = "";

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

        if(isset($_POST['price'])) $price = "SELECT * FROM products WHERE price < '".$_POST["price"]."'";

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
        if ($mp1)
        {
            if($query)
                $query = "$mp1 UNION ALL $query";
            else
                $query = "$mp1";
        }
        if ($mp2)
        {
            if($query)
                $query = "$mp2 UNION ALL $query";
            else
                $query = "$mp2";
        }
        if ($mp3)
        {
            if($query)
                $query = "$mp3 UNION ALL $query";
            else
                $query = "$mp3";
        }
        if ($mp4)
        {
            if($query)
                $query = "$mp4 UNION ALL $query";
            else
                $query = "$mp4";
        }
        if ($optical1)
        {
            if($query)
                $query = "$optical1 UNION ALL $query";
            else
                $query = "$optical1";
        }
        if ($optical2)
        {
            if($query)
                $query = "$optical2 UNION ALL $query";
            else
                $query = "$optical2";
        }
        if ($optical3)
        {
            if($query)
                $query = "$optical3 UNION ALL $query";
            else
                $query = "$optical3";
        }
        if ($optical4)
        {
            if($query)
                $query = "$optical4 UNION ALL $query";
            else
                $query = "$optical4";
        }
        if ($digital1)
        {
            if($query)
                $query = "$digital1 UNION ALL $query";
            else
                $query = "$digital1";
        }
        if ($digital2)
        {
            if($query)
                $query = "$digital2 UNION ALL $query";
            else
                $query = "$digital2";
        }
        if ($digital3)
        {
            if($query)
                $query = "$digital3 UNION ALL $query";
            else
                $query = "$digital3";
        }
        if ($digital4)
        {
            if($query)
                $query = "$digital4 UNION ALL $query";
            else
                $query = "$digital4";
        }
        if ($screen1)
        {
            if($query)
                $query = "$screen1 UNION ALL $query";
            else
                $query = "$screen1";
        }
        if ($screen2)
        {
            if($query)
                $query = "$screen2 UNION ALL $query";
            else
                $query = "$screen2";
        }
        if ($screen3)
        {
            if($query)
                $query = "$screen3 UNION ALL $query";
            else
                $query = "$screen3";
        }
        if ($canon)
        {
            if($query)
                $query = "$canon UNION ALL $query";
            else
                $query = "$canon";
        }
        if ($nikon)
        {
            if($query)
                $query = "$nikon UNION ALL $query";
            else
                $query = "$nikon";
        }
        if ($sony)
        {
            if($query)
                $query = "$sony UNION ALL $query";
            else
                $query = "$sony";
        }
        if ($fujifilm)
        {
            if($query)
                $query = "$fujifilm UNION ALL $query";
            else
                $query = "$fujifilm";
        }
        if ($leica)
        {
            if($query)
                $query = "$leica UNION ALL $query";
            else
                $query = "$leica";
        }
        if ($panasonic)
        {
            if($query)
                $query = "$panasonic UNION ALL $query";
            else
                $query = "$panasonic";
        }
        if ($price)
        {
            if($query)
                $query = "$price UNION ALL $query";
            else
                $query = "$price";
        }
        $array = array();
        $result = mysqli_query($conn,$query);
        if ($result)
        {
            while($row = mysqli_fetch_array($result)) 
            {
                echo $row['id'];
                echo $row['name'];
                echo $row['brand'];
                echo $row['mp'];
                echo $row['optical'];
                echo $row['digital'];
                echo $row['screen'];
                echo $row['color'];
                echo $row['price']; 
                echo "\n";
                //$array[] = $row;

            }
            //print_r($array);
            mysqli_close($conn); 
        }
        else
        {
            echo 'Failed';
            mysqli_close($conn);
        }
		
    }

?>

