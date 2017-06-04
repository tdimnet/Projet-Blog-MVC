<?php
require_once 'Modele/articles.php';
require_once 'Modele/comments.php';

$articles = findAll();

require_once 'Vue/Admin/index.php';
