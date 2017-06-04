<?php

require_once 'Modele/Article.php';

$Article = new Article;
$articles = $Article->findAllPublished();

include_once 'Vue/Blog/index.php';
