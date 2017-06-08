<div class="container">
  <hr>
  <h3>Comments linked to this article</h3>
  <?php
  foreach ($comments as $comment) { ?>
    <div class="row">
      <div class="col-md-6">
        <h4>
          Comment author : <?php echo $comment['full_name']; ?>
          <br>
          <small>
            Author email address : <?php echo $comment['email_address']; ?>
          </small>
        </h4>

        <p>
          Commnent :
          <br>
          <?php echo $comment['comment']; ?>
        </p>
        <a class="btn btn-info sendComment" data="<?php echo $comment['id']; ?>">
          Répondre
        </a>
        <a class="btn btn-warning signal" href="?Controller=Blog&&Action=moderateComment&&commentId=<?php echo $comment['id']; ?>">
          Signaler
        </a>
    </div><!-- /.col-md-6 -->
  </div><!-- /.row -->
  <?php
  }
  ?>
</div><!-- /.container-->
