<?php
include "dbpoll.php";
function template_header($title) {
    //$login = $_SESSION['login'];
    $login = 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Uniclub | Polling System</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
    <nav>
        <div>
            <?php if($login == 2){?>
            <a href="index.php"><i class="fas fa-poll-h"></i>View polls</a>
            <?php } ?>
        </div>
    </nav>
<?php
}
function template_footer() {
?>
    </body>
</html>
<?php
}?>
