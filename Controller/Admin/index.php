<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Services/isLogService.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

session_start();
isConnected($_SESSION);

$articles = findAll();
$comments = findAllComments();


$Comment = new Comment();
$signaledComments = $Comment->retrieveSignaledComments();


if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  // Delete function
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    deleteArticle($Article);
    header('Location: index.php?Controller=Admin');
  }
  // Publish function
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    publishArticle($Article);
    header('Location: index.php?Controller=Admin');
  }
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['id'];
    $text = 'Ce commentaire a été modéré';
    $Comment->moderateComment($commentId, $text);
    header('Location: index.php?Controller=Admin');
  }
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unsignalComment') {
    $commentId = $_GET['id'];
    $abusive = 0;
    $Comment->unsignalComment($commentId, $abusive);
    header('Location: index.php?Controller=Admin');
  }
}


require_once 'Vue/Admin/index.php';
