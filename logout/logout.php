<?php
session_start();
if (isset($_SESSION["user"])) {
    session_unset();
    setcookie("notification", "You have been successfully logged out!", time() + 24 * 3600, "/");
}
header("Location: /login/index.php");
?>