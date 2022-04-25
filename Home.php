<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <title>Hobo|Home</title>
</head>
    <body>
        <!-- <header>
            <?php include('./header.php')?>
        </header> -->
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "hobo22";   
        ?>

    <section id="banner">
        <img src="./img/Narcos_banner.jpg" alt="Banner" class="ban-foto">
        <h1>Narcos: Mexico</h1>
        <p></p>
    </section>
    <h1>Trending</h1>
    <section class="row-home">
        <?php
            $conn = new mysqli($host, $user, $pass, $database); 
             $sql = "SELECT SerieID FROM serie LIMIT 5;"; 
             
             $result = $conn->query($sql); 
             
             if($result){
                foreach($result->fetch_all() as $row){
                    echo "<img src='img/".$row[0].".jpg' >";
            }
             $result->close();
             $conn->close();
             }
        ?>
    </section>
    <h1>Keuze van de makers</h1>
    <section class="row-home">
        <?php
            $conn = new mysqli($host, $user, $pass, $database); 
             $sql = "SELECT SerieID FROM serie LIMIT 5;"; 
             
             $result = $conn->query($sql); 
             
             if($result){
                foreach($result->fetch_all() as $row){
                    echo "<img src='img/0000".$row[0].".jpg' >";
            }
             $result->close();
             $conn->close();
             }
            ?>
    </section>
    </section>
    </body>
</html>