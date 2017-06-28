<h3 class="text-center">Vos articles</h3>
<?php
foreach ($articles as $article) {
?>
<hr>
<h4>Titre de l'article : <?php echo $article->getTitre(); ?></h4>
<h5>Status :
  <em><?php if ($article->getStatus()) { echo 'published'; } else { echo 'not published'; } ?></em>
</h5>
  <div class="btn-group" role="group">
    <a class="btn btn-info" href="?Controller=Admin&&Action=publishArticle&&id=<?php echo $article->getId() ?>" role="button" <?php if ($article->getStatus()) { echo 'disabled'; } ?>>
      Publish an article
    </a>
    <a class="btn btn-warning" href="?Controller=Admin&&Vue=modifyArticle&&id=<?php echo $article->getId() ?>">Modify the article</a>
    <a class="btn btn-danger" href="?Controller=Admin&&Action=deleteArticle&&id=<?php echo $article->getId() ?>">Delete the article</a>
  </div>
<?php
}
?>
