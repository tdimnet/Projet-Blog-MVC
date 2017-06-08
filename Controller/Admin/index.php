<?php
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

$Article = new Article();
$Comment = new Comment();
$articles = $Article->findAll();
$comments = $Comment->findAllComments();
$signaledComments = $Comment->retrieveSignaledComments();


if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  // Delete function
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article->deleteArticle($articleId);
    header('Location: index.php');
  }
  // Publish function
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
    $articleId = $_GET['id'];
    $status = 1;
    $Article->publishArticle($articleId, $status);
    header('Location: index.php');
  }
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['id'];
    $text = 'Ce commentaire a été modéré';
    $Comment->moderateComment($commentId, $text);
  }
}


require_once 'Vue/Admin/index.php';
