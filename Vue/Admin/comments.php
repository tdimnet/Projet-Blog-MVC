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
    Comment author : <?php echo $comment->getFull_name() ?>
    <br>
  </h4>
  <p>
    Commnent :
    <br>
    <?php echo $comment->getComment() ?>
  </p>
  <p>
    <a
      class="btn btn-danger"
      href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment->getId(); ?>"
    >
      Moderate the article comment
    </a>
  </p>
  <hr>
<?php
}
?>
