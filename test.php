<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/history.css">

</head>
<body>
    
    <!-- Header-->

    <header>
                
            <nav>
                <img src="img/logo2.png" alt="logo2.png" width="150px" height="60px">
                <a href="#">Home</a>
                <a href="#">History</a>
                <a href="#">New & popular</a>

                <div class="nav2">
                    <a href=""><button><h1>Account</h1></button></a>
                </div>
            </nav>

            
    </header>   

            
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "hobo22";   

        ?>

        <h1>Trending</h1>

        <section class="row-home">
        <?php
            $conn = new mysqli($host, $user, $pass, $database); 
             $sql = "SELECT SerieID FROM serie LIMIT 6;"; 
             
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

        <section class="teskt2">
            <h1>Recommendations</h1>
        </section>
        
        <section class="row-home2">
        
        <?php
            $conn = new mysqli($host, $user, $pass, $database); 
             $sql = "SELECT SerieID FROM serie LIMIT 6;"; 
             
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
</body>
</html>