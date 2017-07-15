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

// Review Seb
  // Ajouter des tokens pour ajouter des commentaires.
// End review seb


if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  if ($_GET['Controller'] === 'Blog' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['commentId'];
    $articleId = $_GET['articleId'];

    $Article = findOne($articleId);
    $Comment = findOne($commentId);

    if (!is_null($Article) && !is_null($Comment)) {
      signalComment($commentId);
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    } else {
      addFlash('Cet article ou ce commentaire n\'existe pas !');
      header('Location: index.php');
    }


  }
}


include_once 'Vue/Blog/index.php';
