<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';


$articleId = $_GET['id'];
$article = findOne($articleId);
$comments = findCommentByArticle($articleId);

// If the comment is submitted with a POST Method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $Comment = new Comment();

  // We do the verifications
  $name = htmlspecialchars($_POST['name']);
  $comment = htmlspecialchars($_POST['comment']);
  $isAbusive = 0;

  $Comment->setFull_name($name);
  $Comment->setComment($comment);
  $Comment->setArticle_id($articleId);
  $Comment->setAbusive($isAbusive);

  // then we enter the data in database
  addComment($Comment);
  // Finally we redirect the user
  header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
}

require_once 'Vue/Blog/article.php';
