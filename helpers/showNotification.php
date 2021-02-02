<?php
if(isset($_COOKIE["notification"]))
{
    $notification=$_COOKIE["notification"];
    ?>
    <div class="notice">
        <?= $notification ?>
    </div>
    <?php
    setcookie("notification","",time()-24*3600,"/");
}