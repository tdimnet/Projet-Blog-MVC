<?php
use Modele\Article;

require_once 'Modele/ArticleRepository.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

session_start();

$Comment = new Comment;
$Articles = findAllPublished();

if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  if ($_GET['Controller'] === 'Blog' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['commentId'];
    $status = 1;
    var_dump($_GET);
    $Comment->signalComment($commentId, $status);
    header('Location: index.php');
  }
}




include_once 'Vue/Blog/index.php';
