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
    <title>Document</title>
    <link rel="stylesheet" href="css/history2.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <ul>  
                <img src="img/logo2.png" alt="logo2.png">
                <li><a href="#">Home</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Trending</a></li>
                
                <div class="dropdown">
                    <img src="img/account.png">
                    <div class="dropdown-content">
                        <a href="#">Account</a>
                        <a href="#">Settings</a>
                        <a href="#">Logout</a>
                    </div>
                </div

                
            </ul>
        <nav>
    </header>

    <main>

    <h1>Trending</h1>
    <br>
    <div class="row_posters">
        
        <?php
             foreach($user->getPic1() as $pic){
                echo "<img src='img/".$pic->serieID.".jpg' >";
            }
        ?>

    </div>
    </main>
</body>
</html>