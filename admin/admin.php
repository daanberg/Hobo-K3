<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/adminstyle.css">
    <title>Admin</title>
</head>
<body>
    <section id="searchengine">
        <form method="post" action="admin.php">
            <h1>Zoek uw Klant</h1>
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

        <!-- Nu zijn het type="button" omdat submit alle recent gezochte namen cleared -->
    <section class="CRUDBUTTONS">
        <form>
            <input type="button" value="Create">
            <input type="button" value="Read">
            <input type="button" value="Update">
            <input type="submit" value="Delete">
        </form>
    </section>

</body>
</html>