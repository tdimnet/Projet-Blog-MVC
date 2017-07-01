<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';


$articleId = $_GET['id'];
$article = findOne($articleId);

// If the articleId isset and exists, we can access it
if (isset($articleId) && !is_null($article)) {
  $comments = findCommentByArticle($articleId);

  // If the comment is submitted with a POST Method
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Comment = new Comment();

    // We do the verifications
    $name = trim(htmlspecialchars($_POST['name']));
    $comment = trim(htmlspecialchars($_POST['comment']));
    $isAbusive = 0;

    // If the data is empty, we redirect the user
    if (strlen($name) === 0 || strlen($comment) === 0) {
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    // Else it goes on database
    } else {
      $Comment->setFull_name($name);
      $Comment->setComment($comment);
      $Comment->setArticle_id($articleId);
      $Comment->setAbusive($isAbusive);

      // then we enter the data in database
      addComment($Comment);
      // Finally we redirect the user
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    }
  }
  require_once 'Vue/Blog/article.php';
} else {
  header('Location: index.php');
}
