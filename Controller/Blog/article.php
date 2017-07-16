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
    // We do the verifications
    $name = trim(htmlspecialchars($_POST['name']));
    $comment = trim(htmlspecialchars($_POST['comment']));
    $isAbusive = 0;
    $isModerate = 0;

    // If the data is empty, we redirect the user
    if (strlen($name) === 0 || strlen($comment) === 0) {
      addFlash('Un commentaire ne peut pas être vide !');
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    // Else it goes on database
    } else {

      $Comment = new Comment();
      $Comment->setFull_name($name);
      $Comment->setComment($comment);
      $Comment->setArticle_id($articleId);
      $Comment->setAbusive($isAbusive);
      $Comment->setModerate($isModerate);

      // then we enter the data in database
      addComment($Comment);
      // We infor, the user the comment has been posted
      addFlash('Votre commentaire a été ajouté avec succès !');
      // Finally we redirect the user
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    }
  }
  require_once 'Vue/Blog/article.php';
} else {
  addFlash('Cet article n\'existe pas !');
  header('Location: index.php');
}
