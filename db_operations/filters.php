<?php    
    session_start();
    require_once './db_operations/connect.php';

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
        header("Location: ../shop.php?pageno=1");  

    }
?>
