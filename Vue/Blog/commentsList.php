<div class="container">
  <hr>
  <h3>Comments linked to this article</h3>
  <div class="row">
    <div class="col-md-6">
      <?php
      foreach ($comments as $comment) { ?>

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
        <a class="btn btn-info">
          Répondre
        </a>
        <a class="btn btn-warning" href="#">
          Signaler
        </a>
    </div><!-- /.col-md-6 -->
  </div><!-- /.row -->

  <?php
  }
  ?>
</div>
