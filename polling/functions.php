<?php
include "dbpoll.php";
session_start();
function template_header($title) {
$login = $_SESSION['login'];
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

<?php
}
function template_footer() {
?>
    </body>
</html>
<?php
}?>
