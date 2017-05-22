<?php
require_once 'Modele/articles.php';

$article = findOne($_GET['id']);

require_once 'Vue/Blog/article.php';
