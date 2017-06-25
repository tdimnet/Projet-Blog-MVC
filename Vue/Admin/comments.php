<h3 class="text-center">Vos cinq derniers commentaires</h3>
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
