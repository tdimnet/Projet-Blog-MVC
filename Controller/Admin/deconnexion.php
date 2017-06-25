<?php
session_start();
session_destroy();

include_once 'Vue/Admin/deconnexion.php';

header('Location: index.php');
?>
