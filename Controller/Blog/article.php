<?php
require_once 'Modele/articles.php';
require_once 'Modele/comments.php';

$articleId = $_GET['id'];
$article = findOne($articleId);
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
