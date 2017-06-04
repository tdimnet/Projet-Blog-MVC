<?php
require_once 'Modele/Article.php';
require_once 'Modele/comments.php';

$Article = new Article();

$articleId = $_GET['id'];
$article = $Article->findOne($articleId);
$comments = findCommentByArticle($articleId);

// If the comment is submitted with a POST Method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // We do the verifications
  $name = $_POST['name'];
  $mail = $_POST['mail'];
  $comment = $_POST['comment'];

  // then we enter the data in database
  addComment($name, $mail, $comment, $articleId);

  // Finally we redirect the user
  header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
}

require_once 'Vue/Blog/article.php';
