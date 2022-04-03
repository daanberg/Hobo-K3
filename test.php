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
                <a href="#"><img src="img/logo2.png" alt="logo2.png" width="150px" height="60px"></a>
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

        <?php
              $conn = new mysqli($host, $user, $pass, $database); 
              $sql = "SELECT SerieTitel FROM serie WHERE SerieId = 5;"; 
              
              $result = $conn->query($sql); 
              
              if($result){
                 while ($row = $result->fetch_object()){
                 echo$row->SerieTitel;
             }
              $result->close();
              $conn->close();
              }
         ?>
        <h1>Recommendations</h1>

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
    <h1>Zojuist afgekeken</h1>

</body>
</html>