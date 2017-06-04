<?php
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

$Article = new Article();
$Comment = new Comment();

$articleId = $_GET['id'];
$article = $Article->findOne($articleId);
$comments = $Comment->findCommentByArticle($articleId);

// If the comment is submitted with a POST Method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // We do the verifications
  $name = $_POST['name'];
  $mail = $_POST['mail'];
  $comment = $_POST['comment'];

  // then we enter the data in database
  $Comment->addComment($name, $mail, $comment, $articleId);

  // Finally we redirect the user
  header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
}

require_once 'Vue/Blog/article.php';
