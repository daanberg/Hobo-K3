<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobo|Home</title>
</head>
    <body>
        <header>
            <?php include('./header.php') ?>
        </header>
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "hobo22";   

        ?>
    <section>
        <h1>Trending deze week</h1>
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
        <!-- <?php
            $conn = new mysqli($host, $user, $pass, $database); 
               $sql = "SELECT SerieTitel FROM Serie LIMIT 5;";  //SQL code hierin 
               
               $result = $conn->query($sql); 
               
               if($result){
                   while ($row = $result->fetch_object()){
                    echo $row->SerieTitel."<br>"; //laat de resultaten van variabel SQL zien
               }
               $result->close();
               $conn->close();
               }
        ?> -->
    </section>
    </body>
</html>