<div class="container">
  <hr>
  <h3>Comments linked to this article</h3>
  <?php
  foreach ($comments as $comment) { ?>
    <div class="row">
      <div class="col-md-6">
        <h4>
          Comment author : <?php echo $comment->getFull_name(); ?>
          <br>
        </h4>

        <p>
          Commnent :
          <br>
          <?php echo $comment->getComment() ?>
        </p>
        <a
          class="btn btn-info sendComment"
          data="<?php echo $comment->getId(); ?>"
        >
          Répondre
        </a>

        <a
          class="btn btn-warning signal"
          href="?Controller=Blog&&Action=moderateComment&&commentId=<?php echo $comment->getId(); ?>"
        >
          Signaler
        </a>
    </div><!-- /.col-md-6 -->
  </div><!-- /.row -->
  <?php
  }
  ?>
</div><!-- /.container-->
