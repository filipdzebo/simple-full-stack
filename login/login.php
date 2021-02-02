<?php

require "../helpers/connection.php";
session_start();

if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    $username = $_REQUEST["username"];
    $password = md5($_REQUEST["password"]);
    $upit = "select * from users where username='" . $username . "' and password='" . $password . "'";
    $result = mysqli_query($connection, $upit);
    if(mysqli_num_rows($result)>0)
    {
        $user=mysqli_fetch_assoc($result);
        $_SESSION['user']=$user;
        header("Location: /index.php");
    }
    else
    {
        setcookie('notification','Login failed. Wrong username or password!',time()+24*3600,'/');
        header("Location: /login/index.php");
    }
}
