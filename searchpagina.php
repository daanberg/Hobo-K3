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
    <link rel="stylesheet" type="text/css" href="./css/searchpage.css">
    <title>search</title>
</head>
<body>
    <section id="searchengine">
        <form method="post" action="searchpagina.php">
            <input type="text" name="search" required/>
            <input type="submit" value="Search"/>
            <br></br>
        </form>
    </section>
    <section id="searchenginebot">
        <?php
            // (B) PROCESS SEARCH WHEN FORM SUBMITTED
            if (isset($_POST["search"])) {
            // (B1) SEARCH FOR USERS
            require "searchAdmin.php";

            // (B2) DISPLAY RESULTS
            if (count($results) > 0) { foreach ($results as $r) {
                printf("<div>%s %s  =  %s</div>", $r["Voornaam"], $r["Achternaam"], $r["Email"]);
            }} else { echo "Geen resultaten gevonden"; }
            }
        ?>
    </section>
    <section>
        <h1>Trending</h1>
        <br>
        <div class="row_posters">
        
        <?php
             foreach($user->getPic1() as $pic){
                echo "<img src='img/".$pic->serieID.".jpg' >";
            }
        ?>

    </section>
</body>
</html>