<?php

include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<h1>Hello from the admin panel</h1>

<?php
$comments = findAllComments();
var_dump($comments);
?>

<?php
include_once 'Vue/Templates/footer.php';
?>
