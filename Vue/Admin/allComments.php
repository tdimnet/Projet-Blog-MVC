<?php
include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>


<div class="jumbotron text-center">
  <h3>Vos cinq derniers commentaires</h3>
  <small>
    <a href="?Controller=Admin">
      Retourner à l'accueil
    </a>
  </small>
</div>


<div class="container">
<?php
foreach ($allComments as $comment) { ?>

    <div class="col-sm-6 col-md-4 col-lg-3">
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
    </div>
<?php
}
?>
</div>



<?php
include_once 'Vue/Templates/footer.php';
?>
