<?php

require_once 'Modele/articles.php';

$articles = findAll();
var_dump($articles);

include_once 'Vue/Blog/index.php';
