<?php

require_once 'Modele/articles.php';

$articles = findAllPublished();

include_once 'Vue/Blog/index.php';
