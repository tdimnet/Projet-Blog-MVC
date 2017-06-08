<h3 class="text-center">Vos articles</h3>
<hr>
<?php
foreach ($articles as $article) {
?>

<h4>Titre de l'article : <?php echo $article['titre']; ?></h4>
<h5>Status :
  <em><?php if ($article['status']) { echo 'published'; } else { echo 'not published'; } ?></em>
</h5>
  <div class="btn-group" role="group">
    <a class="btn btn-info" href="?Controller=Admin&&Action=publishArticle&&id=<?php echo $article['id'] ?>" role="button" <?php if ($article['status']) { echo 'disabled'; } ?>>
      Publish an article
    </a>
    <a class="btn btn-warning" href="?Controller=Admin&&Vue=modifyArticle&&id=<?php echo $article['id'] ?>">Modify the article</a>
    <a class="btn btn-danger" href="?Controller=Admin&&Action=deleteArticle&&id=<?php echo $article['id'] ?>">Delete the article</a>
  </div>
<?php
}
?>
