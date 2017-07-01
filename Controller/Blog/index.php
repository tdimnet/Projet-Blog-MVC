<?php
use Modele\Article;
use Modele\Comment;

require_once 'Services/flashMessagesService.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

session_start();
if (isset($_SESSION['flashbag'])) {
  $flashMessage = getFlash();
}

$Articles = findAllPublished();

if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  if ($_GET['Controller'] === 'Blog' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['commentId'];
    $articleId = $_GET['articleId'];
    signalComment($commentId);
    header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
  }
}


include_once 'Vue/Blog/index.php';
