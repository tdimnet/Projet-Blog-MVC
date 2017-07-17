<div class="text-center">
  <h3>Vos cinq derniers commentaires</h3>
  <small>
    <a href="?Controller=Admin&&Action=showAllComments">
      Voir tous vos commentaires
    </a>
  </small>
</div>

<?php
foreach ($comments as $comment) { ?>
  <hr>
  <h4>
    Auteur : <?php echo $comment->getFull_name() ?>
    <br>
  </h4>
  <p>
    Commnentaire :
    <br>
    <?php echo $comment->getComment() ?>
    <br>
    <em>Lié à l'article <?php echo $comment->getArticle_id(); ?></em>
  </p>
  <p>
    <a
    class="btn btn-primary"
    href="?Controller=Admin&&Action=unmoderateComment&&id=<?php echo $comment->getId(); ?>&&token=<?= $token ?>"
    >
      Retablir le commentaire
    </a>
    <a
    class="btn btn-danger"
    href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment->getId(); ?>&&token=<?= $token ?>"
    >
      Modérer le commentaire
    </a>
  </p>
  <?php
   if ($comment->getModerate()) {
   ?>
     <div class="alert alert-info">
       Ce commentaire a été moderé.
     </div>
  <?php
   }
  ?>

<?php
}
?>
