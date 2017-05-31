<?php

require_once 'Modele/articles.php';

$articles = findAll();

require_once 'Vue\Admin\modifyArticle.php';
