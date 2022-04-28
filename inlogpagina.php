<?php
require_once 'class/user.php';

$user = new User();

if(isset($_POST['login'])){
	$user->login($_POST);
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
        <a href="signuppagina.html"><button class="btn join-btn">join now</button></a>
        <a href="inlogpagina.html"><button class="btn">sign in</button></a>
    </div>
</nav>

<body>

    <main>
        <div class="login-box">
            <h2>Login</h2>
            <form method="post">
              <div class="user-box">
                <input type="email" name="email" required="">
                <label>email</label>
              </div>
              <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
              </div>
              <div class="submit-box">
            <input type="submit" name="login" value='login'>
            </div>
            </form>
         
            <br>
            <br>
            <br>
            <div class="register">
            <h1>Don't have a account?</h1>
            <a href="signuppagina.html">register here</a>
            </div>
          </div>
    </main>



</body>
</html>