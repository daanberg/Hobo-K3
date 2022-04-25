<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="admin.php">
        <h1>Zoek klanten</h1>
        <input type="text" name="search" required/>
        <input type="submit" value="Search"/>
        <link rel="stylesheet" type="text/css" href="./css/adminstyle.css">
    </form>

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
</body>
</html>