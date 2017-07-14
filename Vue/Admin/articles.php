<h3 class="text-center">Vos articles</h3>
<?php
foreach ($articles as $article) {
?>
<hr>
<h4>Titre de l'article : <?php echo $article->getTitre(); ?></h4>
<h5>Status :
  <em>
    <?php
      if ($article->getStatus()) { echo 'publié'; } else { echo 'non publié'; }
    ?>
  </em>
</h5>
  <div class="btn-group" role="group">
    <a class="btn btn-info"
    <?php
      if (!$article->getStatus()) {
    ?>
        href="?Controller=Admin&&Action=publishArticle&&id=<?= $article->getId() ?>&&<?= $token ?>"
    <?php
      }
    ?>
     role="button" <?php if ($article->getStatus()) { echo 'disabled'; } ?>>
      Publier l'article
    </a>
    <a
      class="btn btn-warning"
      href="?Controller=Admin&&Vue=modifyArticle&&id=<?= $article->getId() ?>"
    >
      Modifier l'article
    </a>
    <a
      class="btn btn-danger"
      href="?Controller=Admin&&Action=deleteArticle&&id=<?= $article->getId() ?>&&token<?= $token ?>"
    >
      Supprimer l'article
    </a>
  </div>
<?php
}
?>
