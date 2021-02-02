<!doctype html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION["user"]))
{
    header("Location: /index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IIKOL Site – Login</title>
    <?php require '../helpers/appendToHead.php' ?>
</head>
<body>
<?php require '../helpers/showNotification.php' ?>
<div class="center-text m-top-120">
    <h2>IIKOL Site</h2>
    <form action="login.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username">
        <br><br>
        <label>Password:</label><br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>