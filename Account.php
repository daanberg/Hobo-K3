<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/Accountstyle.css">
    <title>Account</title>
</head>
<<<<<<< Updated upstream
=======
<?php
    session_start();
    $_SESSION['KlantNr'];   
    require_once './class/user.php';
    $user = new User();
?>
>>>>>>> Stashed changes
<body>
    <div id="uprow">
        <img class="logo"; src="./img/logo.png" alt="Logo">
        <a class="editt" href="./Profile_edit.php">Edit</a> 
    </div>

    <p class="shline">Who's watching?</p>

<!-- Mobile -->

    <section id="pfprow">

    <?php foreach ($user->getProfile() as $userIns) { ?>
            <div class="dropdown" style="float:right;">
                <button class="dropbtn"><img src="./img/<?php echo $userIns->profilepic; ?>" class="pfpImage">
                    <?php echo $userIns->naam; ?>
                </button>
                <div class="dropdown-content">
                    <form method="post">
                        <button class="friendList" name="<?php $pTest ?>">Remove Friend</button>
                    </form>
                </div>
            </div>
        <?php }?>

            <div>
            <img class="imgs" src="./img/pfp.png" alt="Pfp">
                <p>Voorbeeld</p>
            </div>
    </section>

    <section id="pfprow2">
            <div>
                <img class="imgs" src="./img/pfp.png" alt="Pfp">
                <p>Voorbeeld</p>
            </div> 
            <div>
                <a href="./Profile-Edit.php">
                    <img class="imgs" onclick="" src="./img/AddAccount.png" alt="Add Pfp">
                </a>
            </div>

    </section>

<!-- Tablet and Big screen -->

    <section id="nomob">
        <div>
            <img class="imgs" src="./img/pfp.png" alt="Pfp">
                <p>Voorbeeld</p>
            </div>
        <div>
            <img class="imgs" src="./img/pfp.png" alt="Pfp">
                <p>Voorbeeld</p>
            </div>
        <div>
            <img class="imgs" src="./img/pfp.png" alt="Pfp">
                <p>Voorbeeld</p>
            </div>
        <div>
            <img class="imgs" onclick="" src="./img/AddAccount.png" alt="Add Pfp">
        </div>
    </section>
</body>
</html>
