<div class="container">
  <hr>
  <h3>Comments liés à cet article</h3>
  <?php
  foreach ($comments as $comment) { ?>
    <div class="row">
      <hr>
      <div class="col-xs-12">
        <h4>
          Auteur : <?php echo $comment->getFull_name(); ?>
          <br>
        </h4>
        <p>
          <em>Commnentaire :</em>
          <br>
          <?php
           if ($comment->getModerate()) {
              echo "Ce commentaire a été modéré";
           } else {
             echo $comment->getComment();
           }
          ?>
        </p>
        <a
          class="btn btn-warning signal"
          href="?Controller=Blog&&Action=moderateComment&&commentId=<?php echo $comment->getId(); ?>&&articleId=<?php echo $article->getId(); ?>"
        >
          Signaler
        </a>
    </div><!-- /.col-md-6 -->
  </div><!-- /.row -->
  <?php
  }
  ?>
</div><!-- /.container-->
