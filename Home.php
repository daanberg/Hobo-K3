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
        <img src="./img/Narcos_banner.png" alt="Banner">
    </section>

    <div class="tekst1">
        <h1>Narcos: Mexico</h1>
        <p>Volg het begin van de Mexicaanse drugscodog in de Laren 80 in dit waargebeurde, nieuwe Narcos-verbaal over de opkomst van het Guadalajara-kartel </p>
    </div>

        <br></br>    

    <h1>Trending</h1>
 
    <section id="row-home">
        <?php
            foreach($user->getPic() as $pic){
                echo "<img src='img/".$pic->serieID.".jpg' >";
            }
        ?>
    </section>

        <br></br>        

    <h1>Keuze van de makers</h1>

    <section id="row-home">
        <?php
             foreach($user->getPic1() as $pic){
                echo "<img src='img/".$pic->serieID.".jpg' >";
            }
            ?>
    </section>

    </body>
</html>