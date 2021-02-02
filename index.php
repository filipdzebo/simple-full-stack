<?php
session_start();
if (!isset($_SESSION["user"]))
    header("Location: /login/index.php");
require "./helpers/connection.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IIKOL Site - Index</title>
    <?php require './helpers/appendToHead.php' ?>
</head>
<body>
<div>
    <h3 class="display-inline-block m-0">IIKOL Site -Index</h3>
    <div class="display-inline-block float-right">
        Welcome
        <label class="bold">
            <?= $_SESSION["user"]["firstname"] ?>
        </label>,
        <a href="/logout/logout.php">
            Logout
        </a>
    </div>
</div>
<div class="center-text m-top-120">
    <select onchange="getGradesTable(this.value)">
        <option value="0"></option>
        <?php
        $userID = $_SESSION["user"]["ID"];
        $upit = "select distinct year from grades join subjects on grades.subject_id=subjects.id where grades.user_id=" . $userID;
        $result = mysqli_query($connection, $upit);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?= $row["year"] ?>"><?= $row["year"] ?></option>
            <?php
        }
        ?>
    </select>
    <div id="grades-table-container" class="center-text"></div>
</div>
<script>
    getGradesTable(0);
</script>
</body>
</html>
