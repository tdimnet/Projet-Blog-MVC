<?php

// Return all the comments of all articles
function findAllComments() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments');
  $request->execute();
  $comments = $request->fetchAll();
  return $comments;
}

// Return only the comments which match the articleId
function findCommentByArticle($articleId) {
  return 'foo';
}
