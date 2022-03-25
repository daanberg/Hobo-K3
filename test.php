<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/history.css">
    <title>Document</title>
</head>
<body>
    
    <!-- Header-->

    <header>
            <nav>
                <img src="img/hobologo.png" alt="" width="250px" height="70px">
                <a href="#">Home</a>
                <a href="#">History</a>
                <a href="#">New & popular</a>
            </nav>
    </header>   

            
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "hobo22";   

        ?>

        <h1>Recommendations</h1>

    <section id="main">
        <?php
            $conn = new mysqli($host, $user, $pass, $database); 
             $sql = "SELECT SerieID FROM serie LIMIT 5;";  //SQL code hierin 
             
             $result = $conn->query($sql); 
             
             if($result){
                foreach($result->fetch_all() as $row){
                    // echo $row[0]."<br>";
                    // var_dump($row);
                    echo "<img src='img/0000".$row[0].".jpg' >";
            }
             $result->close();
             $conn->close();
             }
        ?>

    </section>
    <h1>Zojuist afgekeken</h1>

</body>
</html>