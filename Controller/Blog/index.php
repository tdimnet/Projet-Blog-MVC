<?php
session_start();
session_destroy();

require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

$Article = new Article;
$Comment = new Comment;
$articles = $Article->findAllPublished();


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
