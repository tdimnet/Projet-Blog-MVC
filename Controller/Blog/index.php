<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

$Articles = findAllPublished();
if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  if ($_GET['Controller'] === 'Blog' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['commentId'];
    $articleId = $_GET['articleId'];

    $Article = findOne($articleId);
    $Comment = findOneComment($commentId);

    if (!is_null($Article) && !is_null($Comment)) {
      signalComment($commentId);
      addFlash('Votre commentaire a bien été signalé !');
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    } else {
      addFlash('Cet article ou ce commentaire n\'existe pas !');
      header('Location: index.php');
    }
  }
}


include_once 'Vue/Blog/index.php';
