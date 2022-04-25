<?php
    require_once 'class/user.php';

    $user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Hobo|Home</title>
</head>
    <body>
        <!-- <header>
            <?php include('./header.php')?>
        </header> -->
    

    <section id="banner">
        <img src="./img/Narcos_banner.jpg" alt="Banner">
        <h1>Narcos: Mexico</h1>
        <p></p>
    </section>
    <h1>Trending</h1>
    <section id="row-home">
        <?php
            // $conn = new mysqli($host, $user, $pass, $database); 
            //  $sql = "SELECT SerieID FROM serie LIMIT 5;"; 
             
            //  $result = $conn->query($sql); 
             
            //  if($result){
            //     foreach($result->fetch_all() as $row){
            //         echo "<img src='img/".$row[0].".jpg' >";
            // }
            //  $result->close();
            //  $conn->close();
            //  }
            foreach($user->getPic() as $pic){
                echo "<img src='img/".$pic->serieID.".jpg' >";
            }
        ?>
    </section>
    <h1>Keuze van de makers</h1>
    <section id="row-home">
        <?php
             foreach($user->getPic1() as $pic){
                echo "<img src='img/".$pic->serieID.".jpg' >";
            }
            ?>
    </section>
    </section>
    </body>
</html>