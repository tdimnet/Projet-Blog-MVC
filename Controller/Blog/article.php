<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';
require_once 'Modele/ArticleRepository.php';


$articleId = $_GET['id'];
$article = findOne($articleId);

var_dump($article);

// $article = $Article->findOne($articleId);
// $comments = $Comment->findCommentByArticle($articleId);

// If the comment is submitted with a POST Method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // We do the verifications
  $name = htmlspecialchars($_POST['name']);
  $mail = htmlspecialchars($_POST['mail']);
  $comment = htmlspecialchars($_POST['comment']);
  $status = 0;

  // then we enter the data in database
  $Comment->addComment($name, $mail, $comment, $articleId, $status);
  // Finally we redirect the user
  header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
}

require_once 'Vue/Blog/article.php';
