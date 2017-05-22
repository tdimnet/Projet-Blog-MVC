<?php
require_once 'Modele/article.php';

$annonce = find($_GET['id']);
var_dump($annonce);

require_once 'Vue/Blog/article.php';
