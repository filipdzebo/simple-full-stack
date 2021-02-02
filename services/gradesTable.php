<?php

session_start();
require "../helpers/connection.php";
require "../helpers/appendToHead.php";

if (isset($_REQUEST["year"])) {
    $year = $_REQUEST["year"];
    $userID = $_SESSION["user"]["ID"];
    if ($year == 0) {
        $upit = "select * from grades join subjects on grades.subject_id=subjects.id where grades.user_id=" . $userID;
    } else {
        $upit = "select * from grades join subjects on grades.subject_id=subjects.id where grades.user_id=" . $userID . " and subjects.year=" . $year;
    }
    $result = mysqli_query($connection, $upit);
    ?>
    <table class="grades-table margin-auto m-top-15" cellspacing="0">
        <thead>
        <tr>
            <th>Predmet</th>
            <th>Godina</th>
            <th>Ocjena</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $row["name"] ?></td>
                <td class="center-text"><?= $row["year"] ?></td>
                <td class="center-text"><?= $row["grade"] ?></td>
            </tr>
            <?php
        }

        ?>
        </tbody>
    </table>
    <?php
}

?>
