<?php

require_once 'Modele/articles.php';

$articles = findAll();

include_once 'Vue/Blog/index.php';
