<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
        $conn = new mysqli($host, $user, $pass, $database); 
               $sql = "";  //SQL code hierin 
               
               $result = $conn->query($sql); 
               
               if($result){
                   while ($row = $result->fetch_object()){

               }
               $result->close();
               $conn->close();
               }
        ?>
    </body>
</html>