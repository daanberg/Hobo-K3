<?php
require_once 'class/user.php';

$user = new User();
if(isset($_POST['register'])){
	$user->create($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/inlog.css">
</head>

<nav class="navbar">
    <img src="img/logo2.png" class="logo" alt="">
    <div class="join-box">
        <p class="join-msg">unlimited tv shows & movies</p>
        <a href="signuppagina.php"><button class="btn join-btn">join now</button></a>
        <a href="inlogpagina.php"><button class="btn">sign in</button></a>
    </div>
</nav>

<body>

    <main>
        <div class="login-box">
            <h2>Sign up</h2>
            <form method="post">
            <div class="user-box">
                <input type="text" name="voornaam" required>
                <label>Voornaam</label>
              </div>
              <div class="user-box">
                <input type="text" name="tussenvoegsel">
                <label>Tussenvoegsel</label>
              </div>
              <div class="user-box">
                <input type="text" name="achternaam" required>
                <label>Surname</label>
              </div>
              <div class="user-box">
                <input type="email" name="email" required>
                <label>email</label>
              </div>
              <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
              </div>
              <div class="user-box">
                <input type="password" name="conf-password" required>
                <label>Re-enter Password</label>
              </div>
              <input type="submit" name="register" value="Register">
            </form>
            <main>
    	<!-- <section class="form">
	    	<form method="post">
	    		<label for="username" id="username" style="color: white;">Gebruikersnaam: </label>
	    		<input type="text" name="username" required>
	    		<label for="password" style="color: white;">Wachtwoord: </label>
	    		<input type="password" name="password" required>
	    		<label for="conf-password" style="color: white;">Wachtwoord bevesteging: </label>
	    		<input type="password" name="conf-password" required>
	    		<input type="submit" name="register" value="Register">
	    	</form>
    	</section> -->
    </main>
            <br>
            <br>
            <br>
            <div class="register">
            <h1>Already have a account?</h1>
            <a href="inlogpagina.php">Login</a>
            </div>
          </div>
    </main>