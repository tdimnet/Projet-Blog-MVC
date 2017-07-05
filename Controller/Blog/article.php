<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';


$articleId = $_GET['id'];

// Todo : récupérer article avec un tableau des commentaires (à faire dans la création d'un article pour qu'il fusionne tous ses commentaires)

// SELECT
// 	a.*,
//     c0.id AS c0_id, c0.full_name AS c0_fullName, c0.comment AS c0_comment, c0.abusive AS c0_abusive,
//     c1.id AS c1_id, c1.full_name AS c1_fullName, c1.comment AS c1_comment, c1.abusive AS c1_abusive,
//     c2.id AS c2_id, c2.full_name AS c2_fullName, c2.comment AS c2_comment, c2.abusive AS c2_abusive,
//     c3.id AS c3_id, c3.full_name AS c3_fullName, c3.comment AS c3_comment, c3.abusive AS c3_abusive
//     FROM articles a
//     LEFT JOIN comments c0 ON c0.article_id = a.id
//     LEFT JOIN comments c1 ON c1.answer_id = c0.id
//     LEFT JOIN comments c2 ON c2.answer_id = c1.id
//     LEFT JOIN comments c3 ON c3.answer_id = c2.id
//     WHERE a.id = 1 AND c0.answer_id IS NULL



$article = findOne($articleId);

// If the articleId isset and exists, we can access it
if (isset($articleId) && !is_null($article)) {
  $comments = findCommentByArticle($articleId);
  $commentAnswers = findCommentsWithAnsweringComments($articleId);

  // If the comment is submitted with a POST Method
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Comment = new Comment();

    // We do the verifications
    $name = trim(htmlspecialchars($_POST['name']));
    $comment = trim(htmlspecialchars($_POST['comment']));
    $isAbusive = 0;
    $isModerate = 0;

    // If the data is empty, we redirect the user
    if (strlen($name) === 0 || strlen($comment) === 0) {
      header('Location: index.php?Controller=Blog&&Vue=article&&id='. $articleId);
    // Else it goes on database
    } else {
      $Comment->setFull_name($name);
      $Comment->setComment($comment);
      $Comment->setArticle_id($articleId);
      $Comment->setAbusive($isAbusive);
      $Comment->setModerate($isModerate);

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
