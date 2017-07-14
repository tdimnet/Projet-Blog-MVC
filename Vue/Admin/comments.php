<div class="text-center">
  <h3>Vos cinq derniers commentaires</h3>
  <small>
    <a href="?Controller=Admin&&Action=showAllComments">
      Voir tous vos commentaires
    </a>
  </small>
</div>

<hr>
<?php
foreach ($comments as $comment) { ?>
  <h4>
    Auteur : <?php echo $comment->getFull_name() ?>
    <br>
  </h4>
  <p>
    Commnentaire :
    <br>
    <?php echo $comment->getComment() ?>
  </p>
  <p>
    <a
    class="btn btn-primary"
    href="?Controller=Admin&&Action=unmoderateComment&&id=<?php echo $comment->getId(); ?>"
    >
      Retablir le commentaire
    </a>
    <a
    class="btn btn-danger"
    href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment->getId(); ?>"
    >
      Modifier le commentaire
    </a>
  </p>
  <hr>
<?php
}
?>
