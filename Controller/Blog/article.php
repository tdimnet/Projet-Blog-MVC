<?php
require_once 'Modele/articles.php';
require_once 'Modele/comments.php';

$articleId = $_GET['id'];
$article = findOne($articleId);
$comments = findCommentByArticle($articleId);

require_once 'Vue/Blog/article.php';
